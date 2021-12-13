<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraitSkillEffect extends Model
{
    use HasFactory;

    public function skill() {
        return $this->belongsTo(Skill::class);
    }

    public function traitEffect() {
        return $this->belongsTo(TraitEffect::class);
    }

    public function trait() {
        return $this->belongsTo(AavegotchiTrait::class);
    }

    protected $fillable = [
        'trait_effect_id',
        'skill_id',
        'multiplier',
        'offset',
        'trait_id'
    ]; 
}
