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
        $response[-1]['amount_total'] = Game::count();
        $response[-1]['amount_24h'] = Game::where('created_at', '>=', Carbon::now()->subDay())->count();
        $response[-1]['amount_7d'] = Game::where('created_at', '>=', Carbon::now()->subWeek())->count();
    
        // Iterate through categories
        $statistics_categories = GameStatisticCategory::all();
        foreach($statistics_categories as $category) {
            $response[$category->id]['total'] = $category->entries()->sum('value');
            $response[$category->id]['24h'] = $category->entries()->where('created_at', '>=', Carbon::now()->subDay())->sum('value');
            $response[$category->id]['7d'] = $category->entries()->where('created_at', '>=', Carbon::now()->subWeek())->sum('value');
        }
    
        // Store result in cache
        Cache::put('game_server_stats', $response);
    }

    private function calculate_game_amounts() {
        // Configure datapoint settings
        $server_game_amounts = [];
        $history_days = 365;
        $point_interval_hours = 1;
        // Calculate start and end dates
        $end_date = new Carbon(Carbon::now()->minute(0)->second(0));
        $start_date = Carbon::now()->subDays($history_days);
        // Fetch all server regions
        $regions = ServerRegion::all();
        $statistics_categories = GameStatisticCategory::all();
        // Loop through all points and count game for that interval for each region
        $current_date = $start_date;
        while ($end_date->greaterThan($current_date)) {
            // Calculate next date
            $next_date= (new Carbon($current_date))->addHours($point_interval_hours);
            // Iterate through regions, game count = -1
            $datapoints = [];
            foreach($regions as &$region) {
                $datapoints[$region->id][-1] = $region->games()->whereBetween('created_at', [$current_date, $next_date])->count();
                foreach($region->games()->whereBetween('created_at', [$current_date, $next_date])->get() as $game) {
                    foreach($statistics_categories as $category) {
                        echo $category->name;
                        echo $game->statistic_entries()->where('game_statistic_category_id', $category->id)->sum('value');
                    }
                }
            }

            // Generate object entry
            $entry['start_date']    = $current_date->toDateTimeString();
            $entry['end_date']      = $next_date->toDateTimeString();
            $entry['data_points']   = $datapoints;
            array_push($server_game_amounts, $entry);
            $current_date = $next_date;
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
