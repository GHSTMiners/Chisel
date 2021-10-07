<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsumableSkillEffectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        $crypto = Crypto::all();
        return view('consumable.create', compact('crypto'));
    }
}
