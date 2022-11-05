<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\CryptoSpawn;


use Illuminate\Http\Request;
use App\Interfaces\WorldRepositoryInterface;

class CryptoSpawnController extends Controller
{
    private WorldRepositoryInterface $worldRepository;

    public function __construct(WorldRepositoryInterface $worldRepository)
    {
        $this->middleware('auth');
        $this->worldRepository = $worldRepository;
    }

    public function index()
    {
        $cryptoSpawns = $this->worldRepository->getSelectedWorld()->cryptoSpawns;
        return view('backend.cryptoSpawns.index', compact('cryptoSpawns'));
    }

    public function create() {
        $crypto = $this->worldRepository->getSelectedWorld()->crypto;
        return view('backend.cryptoSpawns.create', compact('crypto'));
    }

    public function edit(CryptoSpawn $cryptoSpawn) {
        $crypto = $this->worldRepository->getSelectedWorld()->crypto;
        return view('backend.cryptoSpawns.edit', compact('cryptoSpawn', 'crypto'));
    }

    public function destroy(CryptoSpawn $cryptoSpawn) {
        $cryptoSpawn->delete();
        return redirect()->route('crypto-spawns.index');
    }

    public function update(CryptoSpawn $cryptoSpawn) {
        $data = request()->validate([
            'crypto_id' => ['numeric', 'exists:cryptos,id'],
            'starting_layer' => ['numeric', 'gte:0'],
            'ending_layer' => ['numeric', 'gte:0'],
            'spawn_rate' => ['numeric', 'gte:0', 'lte:1'],            
        ]);
        $cryptoSpawn->update($data);
        return redirect()->route('crypto-spawns.index');
    }

    public function store() {
        $data = request()->validate([
            'crypto_id' => ['required', 'numeric', 'exists:cryptos,id'],
            'starting_layer' => ['required', 'numeric', 'gt:0'],
            'ending_layer' => ['required', 'numeric', 'gt:0'],
            'spawn_rate' => ['required', 'numeric', 'gt:0', 'lte:100'],            
        ]);

        $data['world_id'] = $this->worldRepository->getSelectedWorld()->id;

        \App\Models\CryptoSpawn::create($data);
        return redirect()->route('crypto-spawns.index');
    }
}
