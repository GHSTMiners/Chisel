<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Puzzle;
use Illuminate\Http\Request;
use App\Interfaces\WorldRepositoryInterface;

class PuzzleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WorldRepositoryInterface $worldRepository)
    {
        $this->middleware('auth');
        $this->worldRepository = $worldRepository;
    }

    public function index() {
        $puzzles = Puzzle::all();
        return view('backend.puzzle.index', compact('puzzles'));
    }

    public function create() {
        
        return view('backend.puzzle.create');
    }
}
