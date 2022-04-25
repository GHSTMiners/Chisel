<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpgradePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upgrade_prices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('upgrade_id')->references('id')->on('upgrades')->onDelete('cascade');
            $table->foreignId('crypto')->references('id')->on('cryptos')->onDelete('cascade');
            $table->integer('tier_1');
            $table->integer('tier_2');
            $table->integer('tier_3');
            $table->integer('tier_4');
            $table->integer('tier_5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upgrade_prices');
    }
}
