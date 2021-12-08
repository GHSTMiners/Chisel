<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\WhiteSpace;

use Illuminate\Http\Request;

class WhiteSpaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $whiteSpaces = request()->selectedWorld->whiteSpaces;
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
        return redirect()->route('whiteSpace.index');
    }  

    public function update(WhiteSpace $whitespace) {
        $data = request()->validate([
            'starting_layer' => ['numeric', 'gt:0'],
            'ending_layer' => ['numeric', 'gt:0'],
            'spawn_rate' => ['numeric', 'gt:0', 'lte:100'],            
        ]);
        $whitespace->update($data);
        return redirect()->route('whitespace.index');

    }

    public function store() {
        $data = request()->validate([
            'starting_layer' => ['required', 'numeric', 'gt:0'],
            'ending_layer' => ['required', 'numeric', 'gt:0'],
            'spawn_rate' => ['required', 'numeric', 'gt:0', 'lte:100'],            
        ]);
        $data['world_id'] = request()->selectedWorld->id;
        \App\Models\WhiteSpace::create($data);
        return redirect()->route('whitespace.index');
    }
}
