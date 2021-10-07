<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraitVitalEffectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trait_vital_effects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('trait_effect_id')->references('id')->on('trait_effect')->onDelete('cascade');
            $table->bigInteger('vital_id')->references('id')->on('vital')->onDelete('cascade');
            $table->float('multiplier');
            $table->float('offset');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trait_vital_effects');
    }
}
