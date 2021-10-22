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
        return view('consumable.create', compact('crypto'));
    }
}
