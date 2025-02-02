<?php

namespace App\Jobs;

use Illuminate\Support\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

use Cache;

use App\Models\GameStatisticCategory;
use App\Models\ServerRegion;
use App\Models\Gotchi;
use App\Models\Game;

class CalculateServerStats implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    private function calculate_game_stats() {
        // Calculate amount of games
        $response[-1]['total'] = Game::count();
        $response[-1]['24h'] = Game::where('created_at', '>=', Carbon::now()->copy()->startOfDay())->count();
        $response[-1]['7d'] = Game::where('created_at', '>=', Carbon::now()->subWeek()->copy()->startOfDay())->count();
    
        // Iterate through categories
        $statistics_categories = GameStatisticCategory::all();
        foreach($statistics_categories as $category) {
            $response[$category->id]['total'] = $category->entries()->sum('value');
            $response[$category->id]['24h'] = $category->entries()->where('created_at', '>=', Carbon::now()->copy()->startOfDay())->sum('value');
            $response[$category->id]['7d'] = $category->entries()->where('created_at', '>=', Carbon::now()->subWeek()->copy()->startOfDay())->sum('value');
        }
    
        // Store result in cache
        Cache::put('game_server_stats', $response);
    }

    private function calculate_game_amounts() {
        // Configure datapoint settings
        $server_game_amounts = [];
        $history_days = 30;
        // Calculate start and end dates
        $end_date = Carbon::now()->copy()->endOfDay();
        $start_date = Carbon::now()->copy()->subDays($history_days)->startOfDay();
        // Fetch all server regions
        $regions = ServerRegion::all();
        $statistics_categories = GameStatisticCategory::all();
        // Loop through all points and count game for that interval for each region
        $current_date = $start_date;
        while ($end_date->greaterThan($current_date)) {
            // Calculate next date
            $start_of_current_date = $current_date->copy()->startOfDay();
            $end_of_current_date = $current_date->copy()->endOfDay();
            // Iterate through regions, game count = -1
            $datapoints = [];
            foreach($regions as &$region) {
                $datapoints[$region->id] = $region->games()->whereBetween('created_at', [$start_of_current_date, $end_of_current_date])->count();
            }

            // Generate object entry
            $entry['start_date']    = $start_of_current_date->toDateTimeString();
            $entry['end_date']      = $end_of_current_date->toDateTimeString();
            $entry['games_per_region']   = $datapoints;
            array_push($server_game_amounts, $entry);
            $current_date = $start_of_current_date->addDay();
        }
        // Store result in cache
        Cache::put('game_server_stats_historical', $server_game_amounts);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->calculate_game_stats();
        $this->calculate_game_amounts();
    }
}
