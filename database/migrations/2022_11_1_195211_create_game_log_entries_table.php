<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameLogEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_log_entries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->string('log_file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_log_entries');
    }
}
