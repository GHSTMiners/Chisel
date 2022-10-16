<?php

namespace App\Repositories;

use App\Interfaces\WorldRepositoryInterface;
use App\Models\World;

class WorldRepository implements WorldRepositoryInterface 
{
    private World $selected_world;

    function __construct() {
        $selectedWorldID = request()->cookie("selected-world");
        if($selectedWorldID == null) {
            $selectedWorld = World::first();
        } else {
            $selectedWorld = World::find($selectedWorldID);
            if($selectedWorld == null) {
                $selectedWorld = World::first();
            }
        }
        $this->selected_world = $selectedWorld;
    }

    public function getWorld($id) 
    {
        return World::findOrFail($id);
    }

    public function getAllWorlds() 
    {
        return World::all();
    }

    public function getSelectedWorld() 
    {
        return $this->selected_world;
    }
}