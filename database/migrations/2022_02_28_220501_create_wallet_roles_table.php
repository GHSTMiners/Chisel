<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_roles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('wallet_id')->references('id')->on('wallets')->onDelete('cascade');
            $table->boolean('admin')->default(FALSE);
            $table->boolean('developer')->default(FALSE);
            $table->boolean('moderator')->default(FALSE);
            $table->unique('wallet_id');
        });

        //Create a role for every wallet
        $wallets = \App\Models\Wallet::all();
        foreach($wallets as $currentWallet) {
            \App\Models\WalletRole::create([
                'wallet_id' => $currentWallet->id,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_roles');
    }
}
