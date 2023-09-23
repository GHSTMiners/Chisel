<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExplosivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('explosives', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('world_id')->references('id')->on('worlds')->onDelete('cascade');
            $table->string('name');
            $table->string('soil_image');
            $table->string('inventory_image');
            $table->string('drop_image');
            $table->foreignId('crypto_id')->references('id')->on('cryptos')->onDelete('cascade');
            $table->float('price', 8, 2);
            $table->string('explosion_sound');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('explosives');
    }
}
