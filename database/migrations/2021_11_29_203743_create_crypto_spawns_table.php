<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptoSpawnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crypto_spawns', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('world_id')->references('id')->on('worlds')->onDelete('cascade');
            $table->foreignId('crypto_id')->references('id')->on('cryptos')->onDelete('cascade');
            $table->unsignedInteger('starting_layer');
            $table->unsignedInteger('ending_layer');
            $table->float('spawn_rate', 1, 4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crypto_spawns');
    }
}
