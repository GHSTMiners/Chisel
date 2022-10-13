<?php

namespace App\Http\Controllers\API;

use App\Models\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\GameStatisticCategory;
use App\Models\Gotchi;
use App\Models\Game;

class ServerStatsController extends Controller
{
    public function games()
    {
        // Check if response is in cache
        if(!Cache::has('game_server_stats')) {
            abort(503);
        }
        // Fetch from cache and return
        return response()->json(
            Cache::get('game_server_stats'),
            200, [], JSON_UNESCAPED_SLASHES
        );
    }

    
}
