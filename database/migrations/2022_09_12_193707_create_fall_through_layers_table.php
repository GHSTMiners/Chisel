<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFallThroughLayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fall_through_layers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('world_id')->references('id')->on('worlds')->onDelete('cascade');
            $table->integer('layer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fall_through_layers');
    }
}
