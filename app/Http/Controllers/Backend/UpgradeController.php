<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Upgrade;
use Illuminate\Http\Request;
use App\Interfaces\WorldRepositoryInterface;

class UpgradeController extends Controller
{
    public function __construct(WorldRepositoryInterface $worldRepository) {
        $this->middleware('auth');
        $this->worldRepository = $worldRepository;
    }

    public function index() {
        $upgrades = $this->worldRepository->getSelectedWorld()->upgrades;
        return view('backend.upgrade.index', compact('upgrades'));
    }

    public function create() {
        $crypto = $this->worldRepository->getSelectedWorld()->crypto;
        $skills = $this->worldRepository->getSelectedWorld()->skills;
        $vitals = $this->worldRepository->getSelectedWorld()->vitals;

        return view('backend.upgrade.create', compact('crypto', 'skills', 'vitals'));
    }

    public function edit(Upgrade $upgrade) {
        $crypto = $this->worldRepository->getSelectedWorld()->crypto;
        $skills = $this->worldRepository->getSelectedWorld()->skills;
        $vitals = $this->worldRepository->getSelectedWorld()->vitals;

        return view('backend.upgrade.edit', compact('crypto', 'skills', 'vitals', 'upgrade'));
    }

    public function destroy(Upgrade $upgrade) {
        $upgrade->delete();
        return redirect()->route('upgrade.index');
    } 

    public function store() {
        $data = request()->validate(
            [
                'name' => 'required', 'string',
                'description' => 'required', 'string',
                'price' => 'required', 'array',
                'skill' => 'required', 'array',
                'vital' => 'required', 'array',
            ]
        );

        //Create an upgrade in the database
        $upgrade = Upgrade::create([
            'world_id' => $this->worldRepository->getSelectedWorld()->id,
            'name' => $data['name'],
            'description' => $data['description']
        ]);

        //Create prizes for upgrade
        foreach($data['price'] as $key=>$value) {
            if(count(array_filter($value)) > 0) {
                $upgrade->prices()->create(
                    [
                        'crypto_id' => $key,
                        'tier_1' => $value[1],
                        'tier_2' => $value[2],
                        'tier_3' => $value[3],
                        'tier_4' => $value[4],
                        'tier_5' => $value[5]
                    ]
                );
            }
        }

        //Create skill effects for upgrade
        foreach($data['skill'] as $key=>$value) {
            if(!is_null($value)) {
                $upgrade->skill_effects()->create(
                    [
                        'skill_id' => $key,
                        'formula' => $value,
                    ]
                );
            }
        }

        //Create vital effects for upgrade
        foreach($data['vital'] as $key=>$value) {
            if(!is_null($value)) {
                $upgrade->vital_effects()->create(
                    [
                        'vital_id' => $key,
                        'formula' => $value,
                    ]
                );
            }
        }

        return redirect()->route('upgrade.index');
    }

    public function update(Upgrade $upgrade) {
        $data = request()->validate(
            [
                'name' => 'required', 'string',
                'description' => 'required', 'string',
                'price' => 'required', 'array',
                'skill' => 'required', 'array',
                'vital' => 'required', 'array',
            ]
        );

        //Create an upgrade in the database
        $upgrade->update([
            'name' => $data['name'],
            'description' => $data['description']
        ]);

        //Create prizes for upgrade
        $upgrade->prices()->delete();
        foreach($data['price'] as $key=>$value) {
            if(count(array_filter($value)) > 0) {
                $upgrade->prices()->create(
                    [
                        'crypto_id' => $key,
                        'tier_1' => $value[1],
                        'tier_2' => $value[2],
                        'tier_3' => $value[3],
                        'tier_4' => $value[4],
                        'tier_5' => $value[5]
                    ]
                );
            }
        }

        //Create skill effects for upgrade
        $upgrade->skill_effects()->delete();
        foreach($data['skill'] as $key=>$value) {
            if(!is_null($value)) {
                $upgrade->skill_effects()->create(
                    [
                        'skill_id' => $key,
                        'formula' => $value,
                    ]
                );
            }
        }

        //Create vital effects for upgrade
        $upgrade->vital_effects()->delete();
        foreach($data['vital'] as $key=>$value) {
            if(!is_null($value)) {
                $upgrade->vital_effects()->create(
                    [
                        'vital_id' => $key,
                        'formula' => $value,
                    ]
                );
            }
        }

        return redirect()->route('upgrade.index');
    }
}
