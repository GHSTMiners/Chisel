<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SpriteSheetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $spriteSheets = request()->selectedWorld->spriteSheets;
        return view('backend.spritesheets.index', compact('spriteSheets'));
    }

    public function create() {
        return view('backend.spritesheets.create');
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required',
            'layers' => ['numeric', 'between:0,99999.99'],
            'dig_multiplier' => ['required', 'numeric', 'between:0,99999.99'],
            'top_image' => ['required', 'image'],
            'middle_image' => ['required', 'image'],
            'bottom_image' => ['required', 'image']
        ]);
    }
}
