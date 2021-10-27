<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ConsumableSkillEffectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        $crypto = Crypto::all();
        return view('backend.consumable.create', compact('crypto'));
    }
}
