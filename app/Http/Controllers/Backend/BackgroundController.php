<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Background;
use Illuminate\Http\Request;
use App\Interfaces\WorldRepositoryInterface;

class BackgroundController extends Controller
{
    private WorldRepositoryInterface $worldRepository;

    public function __construct(WorldRepositoryInterface $worldRepository)
    {
        $this->middleware('auth');
        $this->worldRepository = $worldRepository;
    }

    public function index() {
        $backgrounds = $this->worldRepository->getSelectedWorld()->backgrounds;
        return view('backend.backgrounds.index', compact('backgrounds'));
    }

    public function create() {
        return view('backend.backgrounds.create');
    }

    public function edit(Background $background ) {
        return view('backend.backgrounds.edit', compact('background'));
    }

    public function update(Background $background) {
        $data = request()->validate([
            'starting_layer' => ['numeric'],
            'ending_layer' => ['numeric'],
            'image' => ['image'],
        ]);

        if(array_key_exists('image', $data)) $data['image'] = $data['image']->store('backgrounds', 'public');

        $background->update($data);
        return redirect()->route('background.index');
    }

    public function destroy(Background $background) {
        $background->delete();
        return redirect()->route('background.index');
    }

    public function store() {
        $data = request()->validate([
            'starting_layer' => ['required', 'numeric'],
            'ending_layer' => ['required', 'numeric'],
            'image' => ['required', 'image'],
        ]);

        if(array_key_exists('image', $data)) $data['image'] = $data['image']->store('backgrounds', 'public');
        $data['world_id'] = $this->worldRepository->getSelectedWorld()->id;

        Background::create($data);
        return redirect()->route('background.index');
    }
}
