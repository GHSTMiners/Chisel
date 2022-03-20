<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Log;
use Illuminate\Http\Request;


class LogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $logs = Log::all();
        return view('backend.logging.index', compact('logs'));
    }
}
