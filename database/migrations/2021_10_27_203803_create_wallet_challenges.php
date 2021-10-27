<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletChallenges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_challenges', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('wallet_id')->references('id')->on('wallets')->onDelete('cascade');
            $table->string('challenge');
            $table->string('id_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_challenges');
    }
}
