<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRockSpawnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rock_spawns', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('world_id')->references('id')->on('worlds')->onDelete('cascade');
            $table->foreignId('rock_id')->references('id')->on('rocks')->onDelete('cascade');
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
        Schema::dropIfExists('rock_spawns');
    }
}
