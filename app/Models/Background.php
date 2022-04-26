<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'starting_layer',
        'ending_layer',
        'world_id'
    ];

    protected $visible = [
        'id', 
        'starting_layer',
        'ending_layer',
        'ending_layer'
    ];
}
