<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerRegion extends Model
{
    use HasFactory;

    public function games() {
        return $this->hasMany(Game::class);
    }

    protected $fillable = [
        'id',
        'name',
        'url',
        'flag',
        'longitude',
        'latitude',
        'active',
        'development_only'
    ];

    protected $visible = [
        'name',
        'url',
        'flag',
        'longitude',
        'latitude',
        'games',
        'development_only'
    ];
}
