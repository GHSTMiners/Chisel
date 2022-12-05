<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('explosives', function (Blueprint $table) {
            $table->boolean('mine')->default(FALSE);
            $table->boolean('ignore_owner')->default(FALSE);
            $table->unsignedInteger('lifespan')->default(0);
            $table->unsignedInteger('purchase_limit')->default(0);
            $table->unsignedInteger('spawn_limit')->default(0);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
