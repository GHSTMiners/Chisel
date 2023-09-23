<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $fillable = [
        'world_id',
        'name',
        'audio'
    ];

    protected $visible = [
        'id', 
        'name',
        'audio'
    ];
}
