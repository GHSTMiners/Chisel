<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAavegotchiTraitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aavegotchi_traits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('short_name');
            $table->string('name');
            $table->smallInteger('blockchain_index');
        });

        \App\Models\AavegotchiTrait::create([
            'short_name' => 'AGG',
            'name' => 'Aggressiveness',
            'blockchain_index' => 0
        ]);

        \App\Models\AavegotchiTrait::create([
            'short_name' => 'NRG',
            'name' => 'Energy',
            'blockchain_index' => 1
        ]);

        \App\Models\AavegotchiTrait::create([
            'short_name' => 'SPK',
            'name' => 'Spookiness',
            'blockchain_index' => 2
        ]);

        \App\Models\AavegotchiTrait::create([
            'short_name' => 'BRN',
            'name' => 'Brain Size',
            'blockchain_index' => 3
        ]);

        \App\Models\AavegotchiTrait::create([
            'short_name' => 'EYS',
            'name' => 'Eye Shape',
            'blockchain_index' => 4
        ]);

        \App\Models\AavegotchiTrait::create([
            'short_name' => 'EYC',
            'name' => 'Eye Color',
            'blockchain_index' => 5
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aavegotchi_traits');
    }
}
