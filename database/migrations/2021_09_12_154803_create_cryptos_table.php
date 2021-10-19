<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cryptos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('world_id')->references('id')->on('worlds')->onDelete('cascade');
            $table->string('name');
            $table->string('wallet_address')->nullable();
            $table->double('weight');
            $table->string('soil_image');
            $table->string('wallet_image');
            $table->string('mining_sound');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cryptos');
    }
}
