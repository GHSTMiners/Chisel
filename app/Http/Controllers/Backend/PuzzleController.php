<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Puzzle;
use Illuminate\Http\Request;

class PuzzleController extends Controller
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
        $puzzles = Puzzle::all();
        return view('puzzle.index', compact('puzzles'));
    }

    public function create() {
        
        return view('puzzle.create');
    }
}
