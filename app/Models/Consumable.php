<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    use HasFactory;

    public function vital_effects() {
        return $this->hasMany(ConsumableVitalEffect::class);
    }

    public function skill_effects() {
        return $this->hasMany(ConsumableSkillEffect::class);
    }

    protected $fillable = [
        'name',
        'world_id',
        'price',
        'crypto_id',
        'description',
        'image',
        'duration',
        'carry_limit',
        'purchase_limit',
        'script'
    ];
}
