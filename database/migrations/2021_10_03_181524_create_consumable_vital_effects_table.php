<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumableVitalEffectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumable_vital_effects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('consumable_id')->references('id')->on('consumables')->onDelete('cascade');
            $table->foreignId('vital_id')->references('id')->on('vitals')->onDelete('cascade');
            $table->string('formula');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumable_vital_effects');
    }
}
