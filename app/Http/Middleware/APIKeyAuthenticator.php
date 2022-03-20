<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

use App\Models\ApiKey;

class APIKeyAuthenticator
{

    protected function redirectTo($request) {

        
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Fetch key from header and validate that it exists
        $request_api_key = $request->header('X-API-Key');
        

        if ($request_api_key === null){
            abort(403);
        }

        // Check if key exists
        $api_key = ApiKey::firstWhere('key', $request_api_key);
        if ($api_key === null) abort(403);

        // Check if key has an ip whitelist, if so validate if client IP is in whitelsit
        $allowed_ips = $api_key->ips;
        if ($allowed_ips->isNotEmpty()){
            
            if (!$allowed_ips->contains($request->ip())){
                abort(401);
            }
        }
        return $next($request);
    }
}
