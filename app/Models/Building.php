<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Building extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'world_id',
        'spawn_x',
        'spawn_y',
        'video',
        'type'
    ];
}
