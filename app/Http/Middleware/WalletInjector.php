<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\WalletAuthToken;

class WalletInjector
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = WalletAuthToken::where('token', $request->cookie("wallet_auth_token"))->first();
        if($token) {
            if($token->wallet->address === $request->cookie("current_wallet")) {
                $connected_wallet = $token->wallet->address;
                //Inject variables into request and into view
                $request->request->add(compact('connected_wallet', 'connected_wallet'));
                \View::share(compact('connected_wallet', 'connected_wallet'));
            }
        }

        //Fetch worlds from database and inject into views
        // $worlds = World::all();
        // $selectedWorldID = $request->cookie("selected-world");
        // // dd($selectedWorldID);
        // if($selectedWorldID == null) {
        //     $selectedWorld = World::first();
        // } else {
        //     $selectedWorld = World::find($selectedWorldID);
        //     if($selectedWorld == null) {
        //         $selectedWorld = World::first();
        //     }
        // }
        // //Inject variables into request and into view
        // $request->request->add(compact('worlds', 'selectedWorld'));
        // \View::share(compact('worlds', 'selectedWorld'));
        return $next($request);
    }
}
