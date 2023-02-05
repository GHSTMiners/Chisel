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
        $skills = $this->worldRepository->getSelectedWorld()->skills;
        $vitals = $this->worldRepository->getSelectedWorld()->vitals;
        return view('backend.consumable.edit', compact('consumable', 'crypto', 'vitals', 'skills'));
    }

    public function destroy(Consumable $consumable) {
        Storage::delete($consumable->image);
        $consumable->delete();
        return redirect()->route('consumable.index');
    }

    public function create() {
        $crypto = $this->worldRepository->getSelectedWorld()->crypto;
        $skills = $this->worldRepository->getSelectedWorld()->skills;
        $vitals = $this->worldRepository->getSelectedWorld()->vitals;
        return view('backend.consumable.create', compact('crypto', 'skills', 'vitals'));
    }

    public function store() {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric', 'between:0,99999.99'],
            'crypto_id' => ['required', 'numeric', 'exists:cryptos,id'],
            'description' => ['required', 'string'],
            'image' => ['required', 'image'],
            'duration' => ['required', 'numeric', 'between:0,99999.99'],
            'carry_limit' => ['required', 'numeric', 'between:0,99999.99'],
            'purchase_limit' => ['required', 'numeric', 'between:0,99999.99'],
            'script' => ['string'],
            'skill' => 'array',
            'vital' => 'array',
        ]);

        $data['image']= $data['image']->store('consumable', 'public');
        $data['world_id'] = $this->worldRepository->getSelectedWorld()->id;

        // Create the consumable
        $newConsumable = \App\Models\Consumable::create($data);

        //Create skill effects for consumable
        foreach($data['skill'] as $key=>$value) {
            if(!is_null($value)) {
                $newConsumable->skill_effects()->create(
                    [
                        'skill_id' => $key,
                        'formula' => $value,
                    ]
                );
            }
        }

        //Create vital effects for consumable
        foreach($data['vital'] as $key=>$value) {
            if(!is_null($value)) {
                $newConsumable->vital_effects()->create(
                    [
                        'vital_id' => $key,
                        'formula' => $value,
                    ]
                );
            }
        }

        return redirect()->route('consumable.index');
    }
}
