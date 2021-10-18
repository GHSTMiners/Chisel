<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    use HasFactory;

    public function consumableVitalEffects() {
        return $this->hasMany(ConsumableVitalEffect::class);
    }

    public function consumableSkillEffects() {
        return $this->hasMany(ConsumableSkillEffect::class);
    }

    protected $fillable = [
        'name',
        'world_id',
        'price',
        'crypto',
        'description',
        'image'
    ];
}
