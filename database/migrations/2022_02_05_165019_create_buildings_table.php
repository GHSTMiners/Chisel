<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('world_id')->references('id')->on('worlds')->onDelete('cascade');
            $table->integer('spawn_x');
            $table->integer('spawn_y');
            $table->text('video');
            $table->text('activation_sound');
            $table->text('activation_message');
            $table->enum('type', ['Fuel', 'Garage', 'Refinery', 'Bazaar']);
            $table->foreignId('crypto_id')->references('id')->on('cryptos')->onDelete('cascade');
            $table->float('price', 8, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
}
