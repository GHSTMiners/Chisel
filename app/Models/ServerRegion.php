<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerRegion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'url',
        'flag',
        'longitude',
        'latitude',
        'active',
    ];

    protected $visible = [
        'name',
        'url',
        'flag',
        'longitude',
        'latitude',
    ];
}
