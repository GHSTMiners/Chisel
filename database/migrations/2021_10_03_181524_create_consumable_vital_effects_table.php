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
            $table->bigInteger('consumable_id')->references('id')->on('consumable')->onDelete('cascade');
            $table->bigInteger('vital_id')->references('id')->on('vital')->onDelete('cascade');
            $table->enum('effect', ['Increase', 'Decrease']);
            $table->enum('modifier', ['Fixed', 'Percentage']);
            $table->smallInteger('amount');
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
