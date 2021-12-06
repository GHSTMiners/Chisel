<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhiteSpace extends Model
{
    use HasFactory;

    protected $fillable = [
        'world_id',
        'starting_layer',
        'ending_layer',
        'spawn_rate'
    ];
}
