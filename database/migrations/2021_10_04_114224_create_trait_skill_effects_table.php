<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraitSkillEffectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trait_skill_effects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('trait_effect_id')->references('id')->on('trait_effect')->onDelete('cascade');
            $table->foreignId('skill_id')->references('id')->on('skill')->onDelete('cascade');
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
        Schema::dropIfExists('trait_skill_effects');
    }
}
