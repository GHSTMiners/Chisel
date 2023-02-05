<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumableSkillEffectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumable_skill_effects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('consumable_id')->references('id')->on('consumables')->onDelete('cascade');
            $table->foreignId('skill_id')->references('id')->on('skills')->onDelete('cascade');
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
        Schema::dropIfExists('consumable_skill_effects');
    }
}
