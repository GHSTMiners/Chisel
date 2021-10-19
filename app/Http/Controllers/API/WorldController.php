<?php

namespace App\Http\Controllers\API;

use Cache;
use App\Models\World;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return World::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(World $world)
    {
        if(!Cache::has('world_'.$world->id)) {
            Cache::put('world_'.$world->id, 
            $world->with('crypto', 'soil', 'explosives', 'rocks', 'skills', 'vitals', 'consumables')->find($world->id),
            now()->addMinutes(10));
        } 
        return Cache::get('world_'.$world->id);
    }
}
