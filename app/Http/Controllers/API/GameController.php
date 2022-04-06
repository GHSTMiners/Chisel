<?php

namespace App\Http\Controllers\API;

use App\Models\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Game;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('api_key');
    }

    public function create()
    {
        // Validate request data
        $data = request()->validate([
            'world_id' =>  ['required', 'numeric', 'exists:worlds,id']
        ]);

        //Generate a random uuid
        $game = Game::create([
            'world_id' => $data['world_id'],
            'room_id' => Str::uuid()
        ]);

        return response()->json(
            $game,
            200, [], JSON_UNESCAPED_SLASHES
        );
    }
}
