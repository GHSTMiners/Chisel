<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use App\Models\TraitEffect;
use App\Models\TraitSkillEffect;

class TraitSkillEffectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(TraitEffect $traitEffect) {
        $skills = request()->selectedWorld->skills;
        return view('backend.traitEffect.editTabs.skillEffect.create', compact('skills', 'traitEffect'));
    }

    public function edit(TraitEffect $traitEffect, $traitSkillEffect) {
        $traitSkillEffect = TraitSkillEffect::findOrFail($traitSkillEffect);
        $skills = request()->selectedWorld->skills;
        return view('backend.traitEffect.editTabs.skillEffect.edit', compact('skills', 'traitEffect', 'traitSkillEffect'));
    }

    public function store(TraitEffect $traitEffect) {
        $data = request()->validate([
            'multiplier' => ['required', 'numeric'],
            'offset' => ['required', 'numeric'],
            'skill_id' => ['required', 'numeric', 'exists:skills,id'],
        ]);

        $data['trait_effect_id'] = $traitEffect->id;
        $data['trait_id'] = $traitEffect->trait_id;


        TraitSkillEffect::create($data);
        return redirect()->route('trait-effect.edit', $traitEffect);
    }

    public function destroy(TraitEffect $traitEffect, $traitSkillEffect) {
        TraitSkillEffect::findOrFail($traitSkillEffect)->destroy($traitSkillEffect);
        return redirect()->route('trait-effect.edit', $traitEffect);
    }
}
