<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Music;
use Illuminate\Http\Request;
use App\Interfaces\WorldRepositoryInterface;

class MusicController extends Controller
{
    private WorldRepositoryInterface $worldRepository;

    public function __construct(WorldRepositoryInterface $worldRepository)
    {
        $this->middleware('auth');
        $this->worldRepository = $worldRepository;
    }

    public function index()
    {
        $music = $this->worldRepository->getSelectedWorld()->music;
        return view('backend.music.index', compact('music'));
    }

    public function create() {
        return view('backend.music.create');
    }

    public function edit(Music $music) {
        return view('backend.music.edit', compact('music'));
    }

    public function destroy(Music $music) {
        $music->delete();
        return redirect()->route('music.index');
    }

    public function update(Music $music) {
        $data = request()->validate([
            'name' => ['string'],
            'audio' => ['mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav,ogg']
        ]);

        if(array_key_exists('audio', $data)) $data['audio'] = $data['audio']->store('music', 'public');

        $music->update($data);
        return redirect()->route('music.index');
    }

    public function store() {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'audio' => ['required', 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav,ogg']          
        ]);

        if(array_key_exists('audio', $data)) $data['audio'] = $data['audio']->store('music', 'public');
        $data['world_id'] = $this->worldRepository->getSelectedWorld()->id;

        \App\Models\Music::create($data);
        return redirect()->route('music.index');
    }
}
