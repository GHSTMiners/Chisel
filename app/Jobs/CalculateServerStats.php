<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Cache;

use App\Models\GameStatisticCategory;
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

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Calculate amount of games
        $response['amount_total'] = Game::count();
        $response['amount_24h'] = Game::where('created_at', '>=', Carbon::now()->subDay())->count();
        $response['amount_7d'] = Game::where('created_at', '>=', Carbon::now()->subWeek())->count();

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
}
