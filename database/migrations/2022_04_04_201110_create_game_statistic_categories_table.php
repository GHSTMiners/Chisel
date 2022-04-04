<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\GameStatisticCategory;

class CreateGameStatisticCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_statistic_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });
        GameStatisticCategory::create([
            'name' => 'Playtime'
        ]);
        GameStatisticCategory::create([
            'name' => 'Blocks mined'
        ]);
        GameStatisticCategory::create([
            'name' => 'Endgame crypto'
        ]);
        GameStatisticCategory::create([
            'name' => 'Damage taken'
        ]);
        GameStatisticCategory::create([
            'name' => 'Deaths'
        ]);
        GameStatisticCategory::create([
            'name' => 'Amount spent on explosives'
        ]);
        GameStatisticCategory::create([
            'name' => 'Amount spent on upgrades'
        ]);
        GameStatisticCategory::create([
            'name' => 'Traveled distance'
        ]);
        GameStatisticCategory::create([
            'name' => 'Fuel consumed'
        ]);
        GameStatisticCategory::create([
            'name' => 'Total crypto'
        ]);  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_statistic_categories');
    }
}
