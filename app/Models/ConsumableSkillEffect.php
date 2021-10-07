<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumableSkillEffect extends Model
{
    use HasFactory;

    public function consumable() {
        return $this->hasOne(Consumable::class);
    }

    public function skill() {
        return $this->belongsTo(Skill::class);
    }

    protected $fillable = [
        'consumable_id',
        'skill_id',
        'effect',
        'modifier',
        'duration',
        'amount'
    ];
}
