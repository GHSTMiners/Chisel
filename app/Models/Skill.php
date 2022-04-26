<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'world_id',
        'description',
        'minimum',
        'maximum',
        'initial',
        'default'
    ];

    protected $visible = [
        'id',
        'name', 
        'description',
        'minimum',
        'maximum',
        'initial'
    ];
}
