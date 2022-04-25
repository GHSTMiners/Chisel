<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpgradeSkillEffectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upgrade_skill_effects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('upgrade_id')->references('id')->on('upgrades')->onDelete('cascade');
            $table->foreignId('skill_id')->references('id')->on('skills')->onDelete('cascade');
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
        Schema::dropIfExists('upgrade_skill_effects');
    }
}
