<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\ServerRegion;
use Illuminate\Http\Request;

class ServerRegionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $regions = ServerRegion::all();
        return view('backend.serverRegions.index', compact('regions'));
    }

    public function create() {
        return view('backend.serverRegions.create');
    }

    public function edit(ServerRegion $serverRegion) {
        return view('backend.serverRegions.edit', compact('serverRegion'));
    }

    public function destroy(ServerRegion $serverRegion) {
        $serverRegion->delete();
        return redirect()->route('server-regions.index');
    }

    public function store() {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'url' => ['required', 'string'],
            'longitude' => ['required', 'numeric'],
            'latitude' => ['required', 'numeric'],
            'flag' => ['required', 'image'],
            'active' => ['boolean'],
            'development_only' => ['boolean']            
        ]);

        $data['flag'] = $data['flag']->store('/flags', 'public');
        $data['active'] = (array_key_exists('active', $data) ? 1 : 0);
        $data['development_only'] = (array_key_exists('development_only', $data) ? 1 : 0);

        \App\Models\ServerRegion::create($data);
        return redirect()->route('server-regions.index');
    }

    public function update(ServerRegion $serverRegion) {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'url' => ['required', 'string'],
            'longitude' => ['required', 'numeric'],
            'latitude' => ['required', 'numeric'],
            'flag' => ['image'],
            'active' => ['boolean'] ,
            'development_only' => ['boolean']           
        ]);

        if(array_key_exists('flag', $data)) $data['flag'] = $data['flag']->store('/flags', 'public');
        $data['active'] = (array_key_exists('active', $data) ? 1 : 0);
        $data['development_only'] = (array_key_exists('development_only', $data) ? 1 : 0);

        $serverRegion->update($data);
        return redirect()->route('server-regions.index');
    }
}
