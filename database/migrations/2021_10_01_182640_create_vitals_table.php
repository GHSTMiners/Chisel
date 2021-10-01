<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vitals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->smallInteger('minimum');
            $table->smallInteger('maximum');
            $table->smallInteger('initial');
            $table->boolean('default')->default(false);
        });
        \App\Models\Vital::create([
            'name' => 'Health',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 100,
            'default' => true
        ]);
        \App\Models\Vital::create([
            'name' => 'Cargo',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 100,
            'default' => true
        ]);
        \App\Models\Vital::create([
            'name' => 'Fuel',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 100,
            'default' => true
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vitals');
    }
}
