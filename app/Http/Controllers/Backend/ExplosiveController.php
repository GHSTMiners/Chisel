<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Explosive;
use App\Models\Crypto;
use Illuminate\Http\Request;
use App\Interfaces\WorldRepositoryInterface;

class ExplosiveController extends Controller
{
    private WorldRepositoryInterface $worldRepository;

    public function __construct(WorldRepositoryInterface $worldRepository) {
        $this->middleware('auth');
        $this->worldRepository = $worldRepository;
    }

    public function index() {
        $explosives = $this->worldRepository->getSelectedWorld()->explosives;
        return view('backend.explosive.index', compact('explosives'));
    }

    public function create() {
        $crypto = Crypto::all();
        return view('backend.explosive.create', compact('crypto'));
    }

    public function destroy(Explosive $explosive) {
        $explosive->delete();
        return redirect()->route('explosive.index');
    }

    public function edit(Explosive $explosive) {
        $crypto = Crypto::all();
        return view('backend.explosive.edit', compact('explosive'), compact('crypto'));
    }

    public function update(Explosive $explosive) {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric', 'between:0,99999.99'],
            'crypto_id' => ['required', 'numeric', 'exists:cryptos,id'],
            'soil_image' => ['image'],
            'inventory_image' => ['image'],
            'drop_image' => ['image'],
            'explosive_coordinates' => ['required', 'array'],
            'explosion_sound' => ['mimes:mp3,wav'],
            'ignore_owner' => 'boolean',
            'mine' => 'boolean',
            'lifespan' => ['required', 'numeric', 'between:0,99999.99'],
            'purchase_limit' => ['required', 'numeric', 'between:0,99999.99'],
            'spawn_limit' => ['required', 'numeric', 'between:0,99999.99']
        ]);

        if(array_key_exists('soil_image', $data)) $data['soil_image'] = $data['soil_image']->store('/explosive', 'public');
        if(array_key_exists('inventory_image', $data)) $data['inventory_image'] = $data['inventory_image']->store('/explosive', 'public');
        if(array_key_exists('drop_image', $data)) $data['drop_image'] = $data['drop_image']->store('/explosive', 'public');
        if(array_key_exists('explosion_sound', $data)) $data['explosion_sound'] = $data['explosion_sound']->store('/explosive', 'public');
        if(!array_key_exists('mine', $data)) $data['mine'] = FALSE;
        if(!array_key_exists('ignore_owner', $data)) $data['ignore_owner'] = FALSE;

        $explosive->explosionCoordinates()->delete();
        foreach($data['explosive_coordinates'] as $columns) {
            foreach($columns as $rows) {
                sscanf($rows, '(%f, %f)', $x, $y);
                $explosive_coordinate = new \App\Models\ExplosionCoordinate([
                    'x' => $x,
                    'y' => $y
                ]);
                $explosive->explosionCoordinates()->save($explosive_coordinate);
            }
        }

        $explosive->update($data);
        return redirect()->route('explosive.index');
    }

    public function store() {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric', 'between:0,99999.99'],
            'crypto_id' => ['required', 'numeric', 'exists:cryptos,id'],
            'soil_image' => ['required', 'image'],
            'inventory_image' => ['required', 'image'],
            'drop_image' => ['required', 'image'],
            'explosive_coordinates' => ['required', 'array'],
            'explosion_sound' => ['required', 'mimes:mp3,wav'],
            'ignore_owner' => 'boolean',
            'mine' => 'boolean',
            'lifespan' => ['required', 'numeric', 'between:0,99999.99'],
            'purchase_limit' => ['required', 'numeric', 'between:0,99999.99'],
            'spawn_limit' => ['required', 'numeric', 'between:0,99999.99']
        ]);


        $soil_image = $data['soil_image']->store('/explosive', 'public');
        $inventory_image = $data['inventory_image']->store('/explosive', 'public');
        $drop_image = $data['drop_image']->store('/explosive', 'public');
        $explosion_sound = $data['explosion_sound']->store('/explosive', 'public');
        if(!array_key_exists('mine', $data)) $data['mine'] = FALSE;
        if(!array_key_exists('ignore_owner', $data)) $data['ignore_owner'] = FALSE;

        $explosive = \App\Models\Explosive::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'crypto_id' => $data['crypto_id'],
            'world_id' => $this->worldRepository->getSelectedWorld()->id,
            'soil_image' => $soil_image,
            'inventory_image' => $inventory_image,
            'drop_image' => $drop_image,
            'explosion_sound' => $explosion_sound,
            'ignore_owner' => $data['ignore_owner'],
            'mine' => $data['mine'],
            'lifespan' => $data['lifespan'],
            'purchase_limit' => $data['purchase_limit'],
            'spawn_limit' => $data['spawn_limit'],
        ]);

        foreach($data['explosive_coordinates'] as $columns) {
            foreach($columns as $rows) {
                sscanf($rows, '(%f, %f)', $x, $y);
                $explosive_coordinate = new \App\Models\ExplosionCoordinate([
                    'x' => $x,
                    'y' => $y
                ]);
                $explosive->explosionCoordinates()->save($explosive_coordinate);
            }
        }

        return redirect()->route('explosive.index');

    }
}
