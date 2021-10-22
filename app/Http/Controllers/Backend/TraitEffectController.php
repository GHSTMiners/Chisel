<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\TraitEffect;
use App\Models\Explosive;
use Illuminate\Http\Request;

class TraitEffectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        //$explosives = Explosive::all();
        //return view('explosive.index', compact('explosives'));
        $traitEffects = TraitEffect::all();
        return view('traitEffect.index', compact('traitEffects'));
    }


}
