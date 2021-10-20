<?php

namespace App\Http\Controllers;

use App\Models\World;
use Illuminate\Http\Request;

class WorldController extends Controller
{

    public function index() {
        return redirect()->route('home');

    }
    public function store() {
        $data = request()->validate([
            'name' => ['string', 'required'],
            'development_mode' => ['boolean'],
            'published' => ['boolean']
        ]);
        
        $newWorld = \App\Models\World::create($data);
        //Select new world
        return back()
        ->with('success', "Succesfully added world: ".$newWorld->name)

        ->withCookie(cookie()->forever("selected-world", $newWorld->id));
    }

    public function show(World $world) {
        return back()
        ->withCookie(cookie()->forever("selected-world", $world->id));
    }

    public function update(World $world) {
        $data = request()->validate([
            'name' => ['string'],
            'development_mode' => ['boolean'],
            'published' => ['boolean']
        ]);
        if(!array_key_exists('development_mode', $data)) $data['development_mode'] = FALSE;
        if(!array_key_exists('published', $data)) $data['published'] = FALSE;


        $world->update($data);
        return back()->with('success','Succesfully edited world: '.$world->name);
    }

    public function destroy(World $world) {
        //Check if there will be any worlds left if we delete this one
        if(sizeof(World::all()) > 1) {
            $selectedWorldID = request()->cookie('selected-world');
            World::destroy($world->id);
        }
        return back()
        ->with('success', "Succesfully deleted world: ".$world->name)
        ->withCookie(cookie()->forever("selected-world", World::first()->id));
    } 
}
