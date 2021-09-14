<?php

namespace App\Http\Controllers;

use App\Models\Soil;
use Illuminate\Http\Request;

class SoilController extends Controller
{
    /**
     * Show the soil overview.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $soil = Soil::all();
        return view('soil.index', compact('soil'));
    }

    public  function  create() {
        return view('soil.create');
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
