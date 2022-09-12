<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FallThroughLayer;


class FallThroughLayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $fallThroughLayers = request()->selectedWorld->fallThroughLayers;
        return view('backend.fallThroughLayer.index', compact('fallThroughLayers'));
    }

    public function edit($id) {
        $fallThroughLayer = FallThroughLayer::findOrFail($id);
        return view('backend.fallThroughLayer.edit', compact('fallThroughLayer'));
    }
    
    public function create() {
        return view('backend.fallThroughLayer.create');
    }

    public function destroy($id) {
        $fallThroughLayer = FallThroughLayer::where('id', $id)->firstOrFail();

        $fallThroughLayer->delete();
        return redirect()->route('fall-through.index');
    }  

    public function update($id) {
        $fallThroughLayer = FallThroughLayer::where('id', $id)->firstOrFail();

        $data = request()->validate([
            'layer' => ['numeric', 'required']
        ]);

        $fallThroughLayer->update($data);
        return redirect()->route('fall-through.index');
    }

    public function store() {
        $data = request()->validate([
            'layer' => ['numeric', 'required'],
        ]);

        $data['world_id'] = request()->selectedWorld->id;
        \App\Models\FallThroughLayer::create($data);
        return redirect()->route('fall-through.index');

    }
}
