<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuzzleBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'puzzle_id',
        'x',
        'y',
        'spawn_type',
        'spawn_id',
        'soil_id'
    ];

    protected $visible = [
        'x',
        'y',
        'spawn_type',
        'spawn_id',
        'soil_id'
    ];
}
