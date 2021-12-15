<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\RockSpawn;

use Illuminate\Http\Request;

class RockSpawnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('worldInjector');
    }

    public function index()
    {
        $rockSpawns = request()->selectedWorld->rockSpawns;
        return view('backend.rockSpawns.index', compact('rockSpawns'));
    }

    public function create() {
        $rocks = request()->selectedWorld->rocks;
        return view('backend.rockSpawns.create', compact('rocks'));
    }

    public function edit(RockSpawn $rockSpawn) {
        $rocks = request()->selectedWorld->rocks;
        return view('backend.rockSpawns.edit', compact('rockSpawn', 'rocks'));
    }

    public function update(RockSpawn $rockSpawn) {
        $rocks = request()->selectedWorld->rocks;
        $data = request()->validate([
            'rock_id' => ['numeric', 'exists:rocks,id'],
            'starting_layer' => ['numeric', 'gte:0'],
            'ending_layer' => ['numeric', 'gte:0'],
            'spawn_rate' => ['numeric', 'gte:0', 'lte:1'],            
        ]);
        $rockSpawn->update($data);
        return redirect()->route('rock-spawns.index');
    }

    public function store() {
        $data = request()->validate([
            'rock_id' => ['required', 'numeric', 'exists:rocks,id'],
            'starting_layer' => ['required', 'numeric', 'gte:0'],
            'ending_layer' => ['required', 'numeric', 'gte:0'],
            'spawn_rate' => ['required', 'numeric', 'gte:0', 'lte:1'],            
        ]);
        $data['world_id'] = request()->selectedWorld->id;
        \App\Models\RockSpawn::create($data);
        return redirect()->route('rock-spawns.index');
    }
}
