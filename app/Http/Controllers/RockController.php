<?php

namespace App\Http\Controllers;

use App\Models\Rock;
use Illuminate\Http\Request;

class RockController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $rocks = Rock::all();
        return view('rock.index', compact('rocks'));
    }

    public function create() {
        return view('rock.create');
    }

    public function destroy(Rock $rock) {
        $rock->delete();
        return redirect()->route('rock.index');
    } 

    public function edit(Rock $rock) {
        return view('rock.edit', compact('rock'));
    }

    public function update(Rock $rock) {
        $data = request()->validate([
            'name' => '',
            'image' => ['image'],
            'digable' => 'boolean',
            'explodeable' => 'boolean',
            'lava' => 'boolean'
        ]);

        if(array_key_exists('image', $data)) $data['image'] = $data['image']->store('/soil', 'public');
        if(!array_key_exists('digable', $data)) $data['digable'] = FALSE;
        if(!array_key_exists('explodeable', $data)) $data['explodeable'] = FALSE;
        if(!array_key_exists('lava', $data)) $data['lava'] = $lava['lava'] = FALSE;

        $rock->update($data);
        return redirect()->route('rock.index');
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required',
            'image' => ['required', 'image'],
            'digable' => 'boolean',
            'explodeable' => 'boolean',
            'lava' => 'boolean'
        ]);
        
        $image = $data['image']->store('/soil', 'public');

        \App\Models\Rock::create([
            'name' => $data['name'],
            'image' => $image,
            'digable' => (array_key_exists('digable', $data) ? 1 : 0),
            'explodeable' => (array_key_exists('explodeable', $data) ? 1 : 0),
            'lava' => (array_key_exists('lava', $data) ? 1 : 0)
        ]);

        return redirect()->route('rock.index');

    }
}
