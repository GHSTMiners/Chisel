<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RockSpawn extends Model
{
    use HasFactory;

    public function rock() {
        return $this->belongsTo(Rock::class);
    }

    protected $fillable = [
        'world_id',
        'rock_id',
        'starting_layer',
        'ending_layer',
        'spawn_rate'
    ];

    protected $visible = [
        'id',
        'rock_id',
        'starting_layer',
        'ending_layer',
        'spawn_rate'
    ];
}
