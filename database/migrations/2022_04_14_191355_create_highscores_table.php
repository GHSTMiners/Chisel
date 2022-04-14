<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHighscoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('highscores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('gotchi_id')->references('id')->on('gotchis')->onDelete('cascade');
            $table->foreignId('game_statistic_category_id')->references('id')->on('game_statistic_categories')->onDelete('cascade');
            $table->foreignId('game_statistic_entry_id')->references('id')->on('game_statistic_entries')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('highscores');
    }
}
