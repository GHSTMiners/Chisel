<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\TraitEffect;
use App\Models\AavegotchiTrait;

use Illuminate\Http\Request;

class TraitEffectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $traitEffects = request()->selectedWorld->traitEffects;
        return view('backend.traitEffect.index', compact('traitEffects'));
    }

    public function create() {
        $traits = AavegotchiTrait::all();
        return view('backend.traitEffect.create', compact('traits'));
    }

    public function edit(TraitEffect $traitEffect ) {
        $traits = AavegotchiTrait::all();
        return view('backend.traitEffect.edit', compact('traits', 'traitEffect'));
    }

    public function destroy(TraitEffect $traitEffect) {
        $traitEffect->delete();
        return redirect()->route('trait-effect.index');
    }   

    public function store() {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'description' => 'nullable|string',
            'trait_id' => ['required', 'numeric', 'exists:aavegotchi_traits,id'],
        ]);
        $data['world_id'] = request()->selectedWorld->id;
        $newTrait = \App\Models\TraitEffect::create($data);
        return redirect()->route('trait-effect.edit', $newTrait);
    }

    public function update(TraitEffect $traitEffect) {
        $data = request()->validate([
            'name' => ['string'],
            'description' => 'nullable|string',
            'trait_id' => ['numeric', 'exists:aavegotchi_traits,id'],
        ]);
        $traitEffect->update($data);
        return redirect()->route('trait-effect.index');
    }
}
