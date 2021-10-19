<?php

namespace App\Http\Controllers;

use App\Models\Soil;
use Illuminate\Http\Request;

class SoilController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $soil = request()->selectedWorld->soil;
        return view('soil.index', compact('soil'));
    }

    public function edit(Soil $soil ) {
        return view('soil.edit', compact('soil'));
    }
    
    public function create() {
        return view('soil.create');
    }
    
    public function destroy(Soil $soil) {
        $soil->delete();
        return redirect()->route('soil.index');
    }    
    
    public function update(Soil $soil) {
        $data = request()->validate([
            'name' => '',
            'layers' => ['numeric', 'between:0,99999.99'],
            'dig_multiplier' => ['numeric', 'between:0,99999.99'],
            'top_image' => ['image'],
            'middle_image' => ['image'],
            'bottom_image' => ['image']
        ]);

        if(array_key_exists('top_image', $data)) $data['top_image'] = $data['top_image']->store('/soil', 'public');
        if(array_key_exists('middle_image', $data)) $data['middle_image'] = $data['middle_image']->store('/soil', 'public');
        if(array_key_exists('bottom_image', $data)) $data['bottom_image'] = $data['bottom_image']->store('/soil', 'public');

        $soil->update($data);
        return redirect()->route('soil.index');
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required',
            'layers' => ['numeric', 'between:0,99999.99'],
            'dig_multiplier' => ['required', 'numeric', 'between:0,99999.99'],
            'top_image' => ['required', 'image'],
            'middle_image' => ['required', 'image'],
            'bottom_image' => ['required', 'image']
        ]);
        
        $topImagePath = $data['top_image']->store('/soil', 'public');
        $middleImagePath = $data['middle_image']->store('/soil', 'public');
        $bottomImagePath = $data['bottom_image']->store('/soil', 'public');
        
        \App\Models\Soil::create([
            'name' => $data['name'],
            'layers' => $data['layers'],
            'world_id' => request()->selectedWorld->id,
            'dig_multiplier' => $data['dig_multiplier'],
            'top_image' => $topImagePath,
            'middle_image' => $middleImagePath,
            'bottom_image' => $bottomImagePath
        ]);
        return redirect()->route('soil.index');
    }
}
