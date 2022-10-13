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
        // Calculate amount of games
        $response['amount_total'] = Game::count();
        $response['amount_24h'] = Game::where('created_at', '>=', Carbon::now()->subDay())->count();
        $response['amount_7d'] = Game::where('created_at', '>=', Carbon::now()->subWeek())->count();
        // Get stats category ID's
        $deaths_category = GameStatisticCategory::where('name' , 'Deaths')->first();
        $total_crypto_category = GameStatisticCategory::where('name' , 'Total crypto')->first();
        $blocks_mined_category = GameStatisticCategory::where('name' , 'Blocks mined')->first();
        // Fetch stats for category ID's
        // Iterate through categories
        $statistics_categories = GameStatisticCategory::all();
        foreach($statistics_categories as $category) {
            $response[$category->id]['total'] = $category->entries()->sum('value');
            $response[$category->id]['24h'] = $category->entries()->where('created_at', '>=', Carbon::now()->subDay())->sum('value');
            $response[$category->id]['7d'] = $category->entries()->where('created_at', '>=', Carbon::now()->subWeek())->sum('value');
        }
        return response()->json(
            $response,
            200, [], JSON_UNESCAPED_SLASHES
        );
    }

    
}
