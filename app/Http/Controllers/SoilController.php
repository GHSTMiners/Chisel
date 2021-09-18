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
        $soil = Soil::all();
        return view('soil.index', compact('soil'));
    }

    public function edit($id) {
        $soil = Soil::findOrFail($id);
        return view('soil.edit', compact('soil'));
    }
    
    public function create() {
        return view('soil.create');
    }
    
    public function destroy($id) {
        $soil = Soil::findOrFail($id);
        $soil->delete();
        return redirect()->route('soil');
    }    
    
    public function update($id) {
        $data = request()->validate([
            'name' => '',
            'dig_multiplier' => ['numeric', 'between:0,99999.99'],
            'top_image' => ['image'],
            'middle_image' => ['image'],
            'bottom_image' => ['image']
        ]);

        $soil = Soil::findOrFail($id);
        $soil->update($data);
        return redirect()->route('soil');
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required',
            'dig_multiplier' => ['required', 'numeric', 'between:0,99999.99'],
            'top_image' => ['required', 'image'],
            'middle_image' => ['required', 'image'],
            'bottom_image' => ['required', 'image']
        ]);
        
        $topImagePath = request('top_image')->store('/soil', 'public');
        $middleImagePath = request('middle_image')->store('/soil', 'public');
        $bottomImagePath = request('bottom_image')->store('/soil', 'public');
        
        \App\Models\Soil::create([
            'name' => $data['name'],
            'dig_multiplier' => $data['dig_multiplier'],
            'top_image' => $topImagePath,
            'middle_image' => $middleImagePath,
            'bottom_image' => $bottomImagePath
        ]);
        return redirect()->route('soil');
    }
}
