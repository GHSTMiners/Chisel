<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('description');
            $table->float('minimum', 9, 2);
            $table->float('maximum', 9, 2);
            $table->float('initial', 9, 2);
            $table->boolean('default')->default(false);
        });

        \App\Models\Skill::create([
            'name' => 'Digging speed',
            'description' => 'Blocks per second',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 1.5,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Flying speed',
            'description' => 'Blocks per second',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 10,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Flying speed acceleration',
            'description' => 'Blocks per second',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 1,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Moving speed acceleration',
            'description' => 'Blocks per second',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 2,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Moving speed',
            'description' => 'Blocks per second',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 10,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Stationary fuel usage',
            'description' => 'Fuel per second',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 0.05,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Digging fuel usage',
            'description' => 'Fuel per block',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 0.25,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Flying fuel usage',
            'description' => 'Fuel per second',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 0.1,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Moving fuel usage',
            'description' => 'Fuel per second',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 0.1,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Max speed before damage',
            'description' => 'Blocks per second',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 0.1,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Consumable price',
            'description' => 'Multiplier',
            'minimum' => 0,
            'maximum' => 2,
            'initial' => 1,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Refinery yield',
            'description' => 'Multiplier',
            'minimum' => 0,
            'maximum' => 2,
            'initial' => 1,
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
        Schema::dropIfExists('skills');
    }
}
