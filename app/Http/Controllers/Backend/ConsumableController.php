<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Consumable;
use App\Models\Crypto;
use App\Models\Vital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\WorldRepositoryInterface;

class ConsumableController extends Controller
{

    public function __construct(WorldRepositoryInterface $worldRepository)
    {
        $this->middleware('auth');
        $this->worldRepository = $worldRepository;
    }

    public function index() {
        $consumables = $this->worldRepository->getSelectedWorld()->consumables;
        return view('backend.consumable.index', compact('consumables'));
    }

    public function edit(Consumable $consumable ) {
        $crypto = $this->worldRepository->getSelectedWorld()->crypto;
        $vitals = $this->worldRepository->getSelectedWorld()->vitals;
        return view('backend.consumable.edit', compact('consumable', 'crypto', 'vitals'));
    }

    public function destroy(Consumable $consumable) {
        Storage::delete($consumable->image);
        $consumable->delete();
        return redirect()->route('consumable.index');
    }

    public function create() {
        $crypto = $this->worldRepository->getSelectedWorld()->crypto;
        return view('backend.consumable.create', compact('crypto'));
    }

    public function store() {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric', 'between:0,99999.99'],
            'crypto' => ['required', 'numeric', 'exists:cryptos,id'],
            'description' => ['required', 'string'],
            'image' => ['required', 'image'],
        ]);

        $image = request('image')->store('consumable', 'public');

        $newConsumable = \App\Models\Consumable::create([
            'name' => $data['name'],
            'world_id' => $this->worldRepository->getSelectedWorld()->id,
            'price' => $data['price'],
            'crypto' => $data['crypto'],
            'description' => $data['description'],
            'image' => $image
        ]);
        return redirect()->route('consumable.edit', $newConsumable->id);
    }
}
