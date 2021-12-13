<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vital extends Model
{
    use HasFactory;

    public function traitEffects() {
        return $this->hasMany(TraitVitalEffect::class);
    }

    protected $fillable = [
        'name',
        'world_id',
        'minimum',
        'maximum',
        'initial',
        'default'
    ];
}
