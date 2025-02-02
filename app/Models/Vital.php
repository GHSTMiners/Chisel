<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vital extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'world_id',
        'minimum',
        'maximum',
        'initial',
        'default'
    ];

    protected $visible = [
        'id',
        'name', 
        'minimum',
        'maximum',
        'initial'
    ];
}
