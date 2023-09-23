<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameStatisticEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_statistic_entries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->foreignId('gotchi_id')->references('id')->on('gotchis')->onDelete('cascade');
            $table->foreignId('wallet_id')->references('id')->on('wallets')->onDelete('cascade');
            $table->foreignId('game_statistic_category_id')->references('id')->on('game_statistic_categories')->onDelete('cascade');
            $table->integer('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_statistic_entries');
    }
}
