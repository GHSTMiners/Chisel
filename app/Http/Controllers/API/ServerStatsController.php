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
        // Amount of games
        $response['amount_total'] = Game::count();
        $response['amount_24h'] = Game::where('created_at', '>=', Carbon::now()->subDay())->count();
        $response['amount_7d'] = Game::where('created_at', '>=', Carbon::now()->subWeek())->count();
        // Get stats category ID's
        $deaths_category = GameStatisticCategory::where('name' , 'Deaths')->first();
        $total_crypto_category = GameStatisticCategory::where('name' , 'Total crypto')->first();
        $blocks_mined_category = GameStatisticCategory::where('name' , 'Blocks mined')->first();
        // Fetch stats for category ID's
        $response['deaths_total'] = $deaths_category->entries()->sum('value');
        $response['deaths_24h'] = $deaths_category->entries()->where('created_at', '>=', Carbon::now()->subDay())->sum('value');
        $response['deaths_7d'] = $deaths_category->entries()->where('created_at', '>=', Carbon::now()->subWeek())->sum('value');

        $response['total_crypto_total'] = $total_crypto_category->entries()->sum('value');
        $response['total_crypto_24h'] = $total_crypto_category->entries()->where('created_at', '>=', Carbon::now()->subDay())->sum('value');
        $response['total_crypto_7d'] = $total_crypto_category->entries()->where('created_at', '>=', Carbon::now()->subWeek())->sum('value');

        $response['blocks_mined_total'] = $blocks_mined_category->entries()->sum('value');
        $response['blocks_mined_24h'] = $blocks_mined_category->entries()->where('created_at', '>=', Carbon::now()->subDay())->sum('value');
        $response['blocks_mined_7d'] = $blocks_mined_category->entries()->where('created_at', '>=', Carbon::now()->subWeek())->sum('value');
        return response()->json(
            $response,
            200, [], JSON_UNESCAPED_SLASHES
        );
    }
}
