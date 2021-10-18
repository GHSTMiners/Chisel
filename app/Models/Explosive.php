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
        'world_id',
        'inventory_image',
        'soil_image',
        'drop_image',
    ];
}
