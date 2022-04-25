<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UpgradeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $upgrades = request()->selectedWorld->upgrades;
        return view('backend.upgrade.index', compact('upgrades'));
    }
}
