<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $crypto = request()->selectedWorld->music;
        return view('backend.music.index', compact('musics', 'crypto'));
    }

    public function create() {
        $crypto = request()->selectedWorld->crypto;
        return view('backend.music.create', compact('crypto'));
    }

    public function edit(Music $music) {
        $crypto = request()->selectedWorld->crypto;
        return view('backend.music.edit', compact('music', 'crypto'));
    }

    public function update(Music $music) {
        $data = request()->validate([
            'music' => ['required', 'mimetypes:audio/x-wav,audio/mpeg'],
            'name' => ['required', 'string']
        ]);

        if(array_key_exists('music', $data)) $data['music'] = $data['music']->store('music', 'public');
        
        $building->update($data);
        return redirect()->route('music.index');
    }
}
