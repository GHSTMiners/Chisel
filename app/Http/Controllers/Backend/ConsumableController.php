<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Consumable;
use App\Models\Crypto;
use App\Models\Vital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConsumableController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $consumables = request()->selectedWorld->consumables;
        return view('backend.consumable.index', compact('consumables'));
    }

    public function edit(Consumable $consumable ) {
        $crypto = Crypto::all();
        $vitals = Vital::all();
        return view('backend.consumable.edit', compact('consumable', 'crypto', 'vitals'));
    }

    public function destroy(Consumable $consumable) {
        Storage::delete($consumable->image);
        $consumable->delete();
        return redirect()->route('consumable.index');
    }

    public function create() {
        $crypto = Crypto::all();
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
            'world_id' => request()->selectedWorld->id,
            'price' => $data['price'],
            'crypto' => $data['crypto'],
            'description' => $data['description'],
            'image' => $image
        ]);
        return redirect()->route('consumable.edit', $newConsumable->id);
    }
}
