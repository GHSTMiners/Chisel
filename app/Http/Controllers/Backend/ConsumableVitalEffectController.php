<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Vital;
use App\Models\Consumable;
use App\Models\ConsumableVitalEffect;
use Illuminate\Http\Request;

class ConsumableVitalEffectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store() {

        $data = request()->validate([
            'consumable_id' => ['required', 'numeric', 'exists:consumables,id'],
            'vital_id' => ['required', 'numeric', 'exists:vitals,id'],
            'effect' => ['required', 'string'],
            'modifier' => ['required', 'string'],
            'amount' => ['required', 'numeric'],
        ]);

        $newEffect = \App\Models\ConsumableVitalEffect::create($data);
        return redirect()->route('consumable.edit', $newEffect->consumable_id);
    }

    public function destroy($effect) {
        dd(ConsumableVitalEffect::find($effect));
        $id = $effect->consumable->id;
        // $effect->delete();
        return redirect()->route('consumable.edit', $id);
    }
}
