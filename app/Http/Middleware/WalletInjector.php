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
        return $next($request);
    }
}
