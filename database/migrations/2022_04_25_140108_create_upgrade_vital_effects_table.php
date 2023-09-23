<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpgradeVitalEffectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upgrade_vital_effects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('upgrade_id')->references('id')->on('upgrades')->onDelete('cascade');
            $table->foreignId('vital_id')->references('id')->on('vitals')->onDelete('cascade');
            $table->text('formula');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upgrade_vital_effects');
    }
}
