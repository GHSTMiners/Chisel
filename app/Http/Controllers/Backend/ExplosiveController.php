<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Explosive;
use App\Models\Crypto;
use Illuminate\Http\Request;

class ExplosiveController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $explosives = request()->selectedWorld->explosives;
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
        return view('backend.explosive.edit', compact('explosive'));
    }

    public function update(Explosive $explosive) {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric', 'between:0,99999.99'],
            'crypto' => ['required', 'numeric', 'exists:cryptos,id'],
            'soil_image' => ['image'],
            'inventory_image' => ['image'],
            'drop_image' => ['image'],
            'explosive_coordinates' => ['required', 'array']
        ]);

        if(array_key_exists('soil_image', $data)) $data['soil_image'] = $data['soil_image']->store('/explosive', 'public');
        if(array_key_exists('inventory_image', $data)) $data['inventory_image'] = $data['inventory_image']->store('/explosive', 'public');
        if(array_key_exists('drop_image', $data)) $data['drop_image'] = $data['drop_image']->store('/explosive', 'public');

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
            'crypto' => ['required', 'numeric', 'exists:cryptos,id'],
            'soil_image' => ['required', 'image'],
            'inventory_image' => ['required', 'image'],
            'drop_image' => ['required', 'image'],
            'explosive_coordinates' => ['required', 'array']
        ]);


        $soil_image = $data['soil_image']->store('/explosive', 'public');
        $inventory_image = $data['inventory_image']->store('/explosive', 'public');
        $drop_image = $data['drop_image']->store('/explosive', 'public');

        $explosive = \App\Models\Explosive::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'crypto' => $data['crypto'],
            'world_id' => request()->selectedWorld->id,
            'soil_image' => $soil_image,
            'inventory_image' => $inventory_image,
            'drop_image' => $drop_image,
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
