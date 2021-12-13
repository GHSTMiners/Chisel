<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraitEffect extends Model
{
    use HasFactory;
 
    public function trait() {
        return $this->belongsTo(AavegotchiTrait::class);
    }

    public function skillEffects() {
        return $this->hasMany(TraitSkillEffect::class);
    }
    
    public function vitalEffects() {
        return $this->hasMany(TraitVitalEffect::class);
    }
    protected $fillable = [
        'trait_id',
        'world_id',
        'name',
        'description'
    ];
}
