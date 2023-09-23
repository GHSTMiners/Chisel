<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\WorldRepositoryInterface;
use App\Repositories\WorldRepository;

class WorldServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(WorldRepositoryInterface::class, WorldRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(WorldRepositoryInterface $worldRepository)
    {
        $worlds = $worldRepository->getAllWorlds();
        $selectedWorld = $worldRepository->getSelectedWorld();
        \View::share(compact('worlds', 'selectedWorld'));
    }
}
