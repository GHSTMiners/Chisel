<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Vital;
use Illuminate\Http\Request;

class VitalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $vitals = request()->selectedWorld->vitals;
        return view('backend.vital.index', compact('vitals'));
    }

    public function edit(Vital $vital) {
        return view('backend.vital.edit', compact('vital'));
    }
    
    public function create() {
        return view('backend.vital.create');
    }

    public function destroy(Vital $vital) {
        if(!$vital->default) $vital->delete();
        return redirect()->route('vital.index');
    }  

    public function update(Soil $soil) {
        $data = request()->validate([
            'name' => ['string', 'required'],
            'minimum' => ['required', 'numeric'],
            'maximum' => ['required', 'numeric'],
            'initial' => ['required', 'numeric']
        ]);

        $soil->update($data);
        return redirect()->route('soil.index');
    }

    public function store() {
        $data = request()->validate([
            'name' => ['string', 'required'],
            'world_id' => request()->selectedWorld->id,
            'minimum' => ['required', 'numeric'],
            'maximum' => ['required', 'numeric'],
            'initial' => ['required', 'numeric']
        ]);
        \App\Models\Vital::create($data);
        return redirect()->route('vital.index');

    }
}
