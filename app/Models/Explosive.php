<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Explosive extends Model
{
    use HasFactory;

    public function explosionCoordinates() {
        return $this->hasMany(ExplosionCoordinate::class);
    }

    protected $fillable = [
        'name',
        'crypto_id',
        'price',
        'world_id',
        'inventory_image',
        'soil_image',
        'drop_image',
        'explosion_sound',
        'mine',
        'ignore_owner',
        'lifespan',
        'purchase_limit',
        'spawn_limit'
    ];

    protected $visible = [
        'id',
        'name',
        'crypto_id',
        'price',
        'inventory_image',
        'soil_image',
        'drop_image',
        'explosion_sound',
        'mine',
        'ignore_owner',
        'lifespan',
        'purchase_limit',
        'spawn_limit',
        'explosionCoordinates'
    ];
}
