<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraitSkillEffect extends Model
{
    use HasFactory;

    public function traitEffect() {
        return $this->hasOne(TraitEffect::class);
    }

    public function skill() {
        return $this->hasOne(Skill::class);
    }
    
    protected $fillable = [
        'trait_effect_id',
        'skill_id'
    ];
}
