<?php

namespace App\Http\Controllers\Backend;

use App\Models\WhiteSpace;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\WorldRepositoryInterface;

class WhiteSpaceController extends Controller
{
    private WorldRepositoryInterface $worldRepository;

    public function __construct(WorldRepositoryInterface $worldRepository)
    {
        $this->middleware('auth');
        $this->worldRepository = $worldRepository;
    }

    public function index() {
        $whiteSpaces = $this->worldRepository->getSelectedWorld()->whiteSpaces;
        return view('backend.whiteSpace.index', compact('whiteSpaces'));
    }

    public function create() {
        return view('backend.whiteSpace.create');
    }

    public function edit(WhiteSpace $whitespace) {
        return view('backend.whiteSpace.edit', compact('whitespace'));
    }

    public function destroy(WhiteSpace $whitespace) {
        $whitespace->delete();
        return redirect()->route('whitespace.index');
    }  

    public function update(WhiteSpace $whitespace) {
        $data = request()->validate([
            'starting_layer' => ['numeric', 'gte:0'],
            'ending_layer' => ['numeric', 'gte:0'],
            'spawn_rate' => ['numeric', 'gte:0', 'lte:1'],  
            'background_only' => 'boolean',
        ]);

        if(!array_key_exists('background_only', $data)) $data['background_only'] = FALSE;

        $whitespace->update($data);
        return redirect()->route('whitespace.index');

    }

    public function store() {
        $data = request()->validate([
            'starting_layer' => ['required', 'numeric', 'gte:0'],
            'ending_layer' => ['required', 'numeric', 'gte:0'],
            'spawn_rate' => ['required', 'numeric', 'gte:0', 'lte:1'],    
            'background_only' => 'boolean',
        ]);

        $data['world_id'] = $this->worldRepository->getSelectedWorld()->id;
        \App\Models\WhiteSpace::create($data);
        return redirect()->route('whitespace.index');
    }
}
