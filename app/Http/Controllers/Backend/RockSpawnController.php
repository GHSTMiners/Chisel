<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\RockSpawn;

use Illuminate\Http\Request;
use App\Interfaces\WorldRepositoryInterface;

class RockSpawnController extends Controller
{
    private WorldRepositoryInterface $worldRepository;

    public function __construct(WorldRepositoryInterface $worldRepository)
    {
        $this->middleware('auth');
        $this->worldRepository = $worldRepository;
    }

    public function index()
    {
        $rockSpawns = $this->worldRepository->getSelectedWorld()->rockSpawns;
        return view('backend.rockSpawns.index', compact('rockSpawns'));
    }

    public function create() {
        $rocks = $this->worldRepository->getSelectedWorld()->rocks;
        return view('backend.rockSpawns.create', compact('rocks'));
    }

    public function edit(RockSpawn $rockSpawn) {
        $rocks = $this->worldRepository->getSelectedWorld()->rocks;
        return view('backend.rockSpawns.edit', compact('rockSpawn', 'rocks'));
    }

    public function destroy(RockSpawn $rockSpawn) {
        $rockSpawn->delete();
        return redirect()->route('rock-spawns.index');
    }

    public function update(RockSpawn $rockSpawn) {
        $rocks = $this->worldRepository->getSelectedWorld()->rocks;
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
        $data['world_id'] = $this->worldRepository->getSelectedWorld()->id;
        \App\Models\RockSpawn::create($data);
        return redirect()->route('rock-spawns.index');
    }
}
