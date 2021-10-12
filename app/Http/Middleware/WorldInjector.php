<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\World;
use Illuminate\Http\Request;

class WorldInjector
{
    /**
     * Handle an incoming request, injects World into all views
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //Fetch worlds from database and inject into views
        $worlds = World::all();
        $selectedWorldID = $request->cookie("selected-world");
        // dd($selectedWorldID);
        if($selectedWorldID == null) {
            $selectedWorld = World::first();
        } else {
            $selectedWorld = World::find($selectedWorldID);
        }
        \View::share(compact('worlds', 'selectedWorld'));
        return $next($request);
    }
}
