<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TraitEffectController extends Controller
{
    public function index() {
        $traitEffect = TraitEffect::all();
        return view('traitEffect.index', compact('traitEffect'));
    }
}
