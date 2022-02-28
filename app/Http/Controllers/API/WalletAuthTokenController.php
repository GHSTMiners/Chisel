<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\WalletChallenge;
use App\Models\WalletAuthToken;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletAuthTokenController extends Controller
{
    public function validate_token()
    {
        // Validate request data
        $data = request()->validate([
            'wallet_address' => ['required', 'regex:/^0x[a-fA-F0-9]{40}$/'],
            'token' => ['required', 'string']
        ]);

        //Fetch token for this request
        $token = WalletAuthToken::where('token', $data['token'])->first();

    }
}
