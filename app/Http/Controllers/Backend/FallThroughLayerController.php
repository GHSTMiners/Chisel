<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\FallThroughLayer;
use App\Http\Controllers\Controller;
use App\Interfaces\WorldRepositoryInterface;

class FallThroughLayerController extends Controller
{
    private WorldRepositoryInterface $worldRepository;

    public function __construct(WorldRepositoryInterface $worldRepository)
    {
        $this->middleware('auth');
        $this->worldRepository = $worldRepository;
    }

    public function index() {
        $fallThroughLayers = $this->worldRepository->getSelectedWorld()->fallThroughLayers;
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

        $data['world_id'] = $this->worldRepository->getSelectedWorld()->id;
        \App\Models\FallThroughLayer::create($data);
        return redirect()->route('fall-through.index');

    }
}
