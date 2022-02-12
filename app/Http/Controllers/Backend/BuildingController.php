<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $buildings = request()->selectedWorld->buildings;
        return view('backend.building.index', compact('buildings'));
    }

    public function create() {
        return view('backend.building.create');
    }

    public function edit(Building $building ) {
        return view('backend.building.edit', compact('building'));
    }

    public function update(Building $building) {
        $data = request()->validate([
            'type' => [],
            'spawn_x' => ['numeric'],
            'spawn_y' => ['numeric'],
            'video' => ['mimetypes:video/webm'],
        ]);

        if(array_key_exists('video', $data)) $data['video'] = $data['video']->store('buildings', 'public');

        $building->update($data);
        return redirect()->route('building.index');
    }

    public function destroy(Building $building) {
        $building->delete();
        return redirect()->route('building.index');
    }

    public function store() {
        $data = request()->validate([
            'type' => ['required'],
            'spawn_x' => ['required', 'numeric'],
            'spawn_y' => ['required', 'numeric'],
            'video' => ['required', 'mimetypes:video/webm'],
        ]);

        $data['world_id'] = request()->selectedWorld->id;
        $data['video'] = request('video')->store('buildings', 'public');
        \App\Models\Building::create($data);
        return redirect()->route('building.index');
    }
}
