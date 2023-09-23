<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExplosionCoordinatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('explosion_coordinates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('explosive_id');
            $table->foreign('explosive_id')->references('id')->on('explosives')->onDelete('cascade');
            $table->smallInteger('x');
            $table->smallInteger('y');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('explosion_coordinates');
    }
}
