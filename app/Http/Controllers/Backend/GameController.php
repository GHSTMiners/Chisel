<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;


class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $games = Game::all();
        return view('backend.games.index', compact('games'));
    }
}
