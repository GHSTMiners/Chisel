<?php

namespace App\Repositories;

use App\Interfaces\WorldRepositoryInterface;
use App\Models\World;

class WorldRepository implements WorldRepositoryInterface 
{
    private World $selected_world;



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
        return $this->selected_world;
    }
}