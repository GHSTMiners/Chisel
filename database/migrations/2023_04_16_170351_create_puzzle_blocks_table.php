<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('puzzle_blocks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('puzzle_id')->references('id')->on('puzzles')->onDelete('cascade');
            $table->integer('x');
            $table->integer('y');
            $table->enum('spawn_type', ['None', 'Crypto', 'Consumable', 'Explosive', 'Rock']);
            $table->integer('spawn_id')->default(-1);
            $table->integer('soil_id')->default(-1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puzzle_blocks');
    }
};
