<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\WalletChallenge;
use App\Models\WalletAuthToken;
use App\Models\Wallet;
use Carbon\Carbon;

class WalletChallengeController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function challenge()
    {
        // Validate request data
        $data = request()->validate([
            'wallet_address' => ['required', 'regex:/^0x[a-fA-F0-9]{40}$/'],
            'chain_id' => ['required', 'numeric']
        ]);
        
        // Fetch/create wallet
        $wallet = Wallet::where('address', $data['wallet_address'])->first();
        if($wallet === null) {
            $wallet = Wallet::create([
                'address' => $data['wallet_address'],
                'chain_id' => $data['chain_id']
            ]);
        }
        // Generate a challenge
        $challenge = WalletChallenge::create([
            'challenge' =>  Str::random(env('APP_CHALLENGE_SIZE', 40)),
            'wallet_id' => $wallet->id,
            'id_address' => request()->ip()    
        ]);
        
        // Return challenge as JSON
        return response()->json(
            $challenge,
            200, [], JSON_UNESCAPED_SLASHES
        );
    }
    
    public function validate_challenge() {
        // Validate request data
        $data = request()->validate([
            'wallet_address' => ['required', 'regex:/^0x[a-fA-F0-9]{40}$/'],
            'chain_id' => ['required', 'numeric'],
            'challenge' => ['required', 'string', 'size:'.env('APP_CHALLENGE_SIZE', 40)],
            'signature' => ['required', 'string']
        ]);
        
        // Fetch challenge and check if it is valid
        $challenge = WalletChallenge::where('challenge', $data['challenge'])->first();
        if($challenge === null or $challenge->created_at->addMinutes(env('APP_CHALLENGE_DURATION', 15)) < Carbon::now()  ) {
            abort(403);
        } 
        
        //Fetch the wallet that this challenge is from and check agains request data
        if( $challenge->wallet->address !== $data['wallet_address'] or $challenge->wallet->chain_id !== (int)$data['chain_id']) {
            abort(403);
        }
         
        // Verify signature
        if(personal_ecRecover($data['challenge'], $data['signature']) !== strtolower($challenge->wallet->address)) {
            abort(403);
        }

        //If we reach this point, we can create a wallet auth token
        $token = WalletAuthToken::create([
            'wallet_id' => $challenge->wallet->id,
            'token' => Str::random(255)
        ]);

        //Create cookie
        $minutes = 365 * 24 * 60;
        $cookie = cookie('wallet_auth_token', $token->token, $minutes, '/');


        return response()->json(
            $token,
            200, [], JSON_UNESCAPED_SLASHES
        )
        ->withCookie($cookie);
    }

    public function authenticate() {
        // Validate request data
        $data = request()->validate([
            'wallet_address' => ['required', 'regex:/^0x[a-fA-F0-9]{40}$/'],
            'chain_id' => ['required', 'numeric']
        ]);

        // Check if cookie exists
        $auth_token = $request->cookie('wallet_auth_token_'.$data['wallet_address']);
        if($auth_token) {
            // Validate auth token agains database
            $wallet_auth_token = WalletAuthToken::where('token', $auth_token)->first();
            if($wallet_auth_token) {
                if($wallet_auth_token->wallet->address === $data['wallet_address']) {
                    return response()->json(
                        true,
                        200, [], JSON_UNESCAPED_SLASHES
                    );
                } else abort(403);
            } else abort(403);
        } else {
            abort(403);
        }
    }
}
