<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class World extends Model
{
    use HasFactory;

    public function backgrounds() {
        return $this->hasMany(Background::class);
    }

    public function crypto() {
        return $this->hasMany(Crypto::class);
    }

    public function cryptoSpawns() {
        return $this->hasMany(CryptoSpawn::class);
    }

    public function soil() {
        return $this->hasMany(Soil::class);
    }

    public function buildings() {
        return $this->hasMany(Building::class);
    }

    public function explosives() {
        return $this->hasMany(Explosive::class);
    }

    public function rocks() {
        return $this->hasMany(Rock::class);
    }

    public function rockSpawns() {
        return $this->hasMany(RockSpawn::class);
    }

    public function skills() {
        return $this->hasMany(Skill::class);
    }

    public function vitals() {
        return $this->hasMany(Vital::class);
    }

    public function consumables() {
        return $this->hasMany(Consumable::class);
    }

    public function whiteSpaces() {
        return $this->hasMany(WhiteSpace::class);
    }

    public function spriteSheets() {
        return $this->hasMany(SpriteSheet::class);
    }

    public function music() {
        return $this->hasMany(Music::class);
    }

    public static function create(array $attributes = []) {
        $model = static::query()->create($attributes);
        echo $model->id;

        //Create skills
        \App\Models\Skill::create([
            'name' => 'Digging speed',
            'world_id' => $model->id,
            'description' => 'Blocks per second',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 1.5,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Flying speed',
            'world_id' => $model->id,
            'description' => 'Blocks per second',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 10,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Flying speed acceleration',
            'world_id' => $model->id,
            'description' => 'Blocks per second',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 1,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Moving speed acceleration',
            'world_id' => $model->id,
            'description' => 'Blocks per second',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 2,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Moving speed',
            'world_id' => $model->id,
            'description' => 'Blocks per second',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 10,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Stationary fuel usage',
            'world_id' => $model->id,
            'description' => 'Fuel per second',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 0.05,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Digging fuel usage',
            'world_id' => $model->id,
            'description' => 'Fuel per block',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 0.25,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Flying fuel usage',
            'world_id' => $model->id,
            'description' => 'Fuel per second',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 0.1,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Moving fuel usage',
            'world_id' => $model->id,
            'description' => 'Fuel per second',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 0.1,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Max speed before damage',
            'world_id' => $model->id,
            'description' => 'Blocks per second',
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 0.1,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Consumable price',
            'world_id' => $model->id,
            'description' => 'Multiplier',
            'minimum' => 0,
            'maximum' => 2,
            'initial' => 1,
            'default' => true
        ]);

        \App\Models\Skill::create([
            'name' => 'Refinery yield',
            'world_id' => $model->id,
            'description' => 'Multiplier',
            'minimum' => 0,
            'maximum' => 2,
            'initial' => 1,
            'default' => true
        ]);

        //Create vitals
        \App\Models\Vital::create([
            'name' => 'Health',
            'world_id' => $model->id,
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 100,
            'default' => true
        ]);
        \App\Models\Vital::create([
            'name' => 'Cargo',
            'world_id' => $model->id,
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 100,
            'default' => true
        ]);
        \App\Models\Vital::create([
            'name' => 'Fuel',
            'world_id' => $model->id,
            'minimum' => 0,
            'maximum' => 100,
            'initial' => 100,
            'default' => true
        ]);

        return $model;
    }

    protected $fillable = [
        'name',
        'development_mode',
        'published',
        'video',
        'description',
        'width',
        'height'
    ];
}
