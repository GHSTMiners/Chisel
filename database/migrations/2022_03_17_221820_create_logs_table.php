<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('ip_address_id')->references('id')->on('ip_addresses')->onDelete('cascade')->nullable();
            $table->foreignId('gotchi_id')->references('id')->on('gotchis')->onDelete('cascade')->nullable();
            $table->foreignId('wallet_id')->references('id')->on('wallets')->onDelete('cascade')->nullable();
            $table->integer('score');
            $table->string('event');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
