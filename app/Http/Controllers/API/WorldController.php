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
        return response()->json(
            World::where('published', true)->get(),
            200, [], JSON_UNESCAPED_SLASHES
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(World $world)
    {
        if(!$world->published) abort(404);
        if(!Cache::has('world_'.$world->id) || $world->development_mode) {
            Cache::put('world_'.$world->id, 
            $world->with('crypto.spawns', 'puzzles.blocks', 'backgrounds', 'buildings', 'music', 'soil', 'whiteSpaces', 'explosives.explosionCoordinates', 'rocks.spawns', 'skills', 'vitals', 'upgrades.prices', 'upgrades.skill_effects', 'upgrades.vital_effects', 'consumables.skill_effects', 'consumables.vital_effects', 'fallThroughLayers')->find($world->id),
            now()->addMinutes(10));
        } 
        return response()->json(
            Cache::get('world_'.$world->id),
            200, [], JSON_UNESCAPED_SLASHES
        );
    }
}
