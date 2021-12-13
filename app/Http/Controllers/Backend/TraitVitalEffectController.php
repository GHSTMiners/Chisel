<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\AavegotchiTrait;

use App\Models\TraitEffect;
use App\Models\TraitVitalEffect;

class TraitVitalEffectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(TraitEffect $traitEffect) {
        $vitals = request()->selectedWorld->vitals;
        return view('backend.traitEffect.editTabs.vitalEffect.create', compact('vitals', 'traitEffect'));
    }

    public function edit(TraitEffect $traitEffect, $traitVitalEffect) {
        $traitVitalEffect = TraitVitalEffect::findOrFail($traitVitalEffect);
        $vitals = request()->selectedWorld->vitals;
        return view('backend.traitEffect.editTabs.vitalEffect.edit', compact('vitals', 'traitEffect', 'traitVitalEffect'));
    }

    public function store(TraitEffect $traitEffect) {
        $data = request()->validate([
            'multiplier' => ['required', 'numeric'],
            'offset' => ['required', 'numeric'],
            'vital_id' => ['required', 'numeric', 'exists:vitals,id'],
        ]);

        $data['trait_effect_id'] = $traitEffect->id;
        $data['trait_id'] = $traitEffect->trait_id;


        TraitVitalEffect::create($data);
        return redirect()->route('trait-effect.edit', $traitEffect);
    }

    public function destroy(TraitEffect $traitEffect, $traitVitalEffect) {
        TraitVitalEffect::findOrFail($traitVitalEffect)->destroy($traitVitalEffect);
        return redirect()->route('trait-effect.edit', $traitEffect);
    }
}
