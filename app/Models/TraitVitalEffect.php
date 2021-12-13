<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraitVitalEffect extends Model
{
    use HasFactory;

    public function vital() {
        return $this->belongsTo(Vital::class);
    }

    public function traitEffect() {
        return $this->belongsTo(TraitEffect::class);
    }

    public function trait() {
        return $this->belongsTo(AavegotchiTrait::class);
    }
    
    protected $fillable = [
        'trait_effect_id',
        'vital_id',
        'multiplier',
        'offset',
        'trait_id'
    ];
}
