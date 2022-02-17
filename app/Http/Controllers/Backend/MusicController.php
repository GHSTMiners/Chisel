<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Music;
use Illuminate\Http\Request;


class MusicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $music = request()->selectedWorld->music;
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
            'music' => ['mimes:mp3,wav']
        ]);

        if(array_key_exists('music', $data)) $data['music'] = $data['music']->store('music', 'public');

        $music->update($data);
        return redirect()->route('music.index');
    }

    public function store() {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'audio' => ['required', 'mimes:mp3,wav']          
        ]);

        if(array_key_exists('audio', $data)) $data['audio'] = $data['audio']->store('audio', 'public');
        $data['world_id'] = request()->selectedWorld->id;

        \App\Models\Music::create($data);
        return redirect()->route('music.index');
    }
}
