<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Building;
use Illuminate\Http\Request;
use App\Interfaces\WorldRepositoryInterface;

class BuildingController extends Controller
{
    private WorldRepositoryInterface $worldRepository;

    public function __construct(WorldRepositoryInterface $worldRepository)
    {
        $this->middleware('auth');
        $this->worldRepository = $worldRepository;
    }

    public function index() {
        $crypto = $this->worldRepository->getSelectedWorld()->crypto;
        $buildings = $this->worldRepository->getSelectedWorld()->buildings;
        return view('backend.building.index', compact('buildings', 'crypto'));
    }

    public function create() {
        $crypto = $this->worldRepository->getSelectedWorld()->crypto;
        return view('backend.building.create', compact('crypto'));
    }

    public function edit(Building $building ) {
        $crypto = $this->worldRepository->getSelectedWorld()->crypto;
        return view('backend.building.edit', compact('building', 'crypto'));
    }

    public function update(Building $building) {
        $data = request()->validate([
            'type' => [],
            'spawn_x' => ['numeric'],
            'spawn_y' => ['numeric'],
            'price' => ['numeric'],
            'crypto_id' => ['numeric', 'exists:cryptos,id'],
            'activation_message' => ['string'],
            'video' => ['mimetypes:video/webm'],
            'activation_sound' => ['mimetypes:audio/x-wav,audio/mpeg'],
        ]);

        if(array_key_exists('video', $data)) $data['video'] = $data['video']->store('buildings', 'public');
        if(array_key_exists('activation_sound', $data)) $data['activation_sound'] = $data['activation_sound']->store('buildings', 'public');

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
            'price' => ['required', 'numeric'],
            'crypto_id' => ['required', 'numeric', 'exists:cryptos,id'],
            'activation_message' => ['required', 'string'],
            'video' => ['required', 'mimetypes:video/webm'],
            'activation_sound' => ['required', 'mimetypes:audio/x-wav,audio/mpeg'],
        ]);
        $data['world_id'] = $this->worldRepository->getSelectedWorld()->id;
        $data['video'] = request('video')->store('buildings', 'public');
        $data['activation_sound'] = request('activation_sound')->store('buildings', 'public');

        \App\Models\Building::create($data);
        return redirect()->route('building.index');
    }
}
