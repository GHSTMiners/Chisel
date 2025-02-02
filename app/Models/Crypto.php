<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crypto extends Model
{
    use HasFactory;

    public function spawns() {
        return $this->hasMany(CryptoSpawn::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'shortcode',
        'world_id',
        'wallet_address',
        'weight',
        'soil_image',
        'wallet_image',
        'mining_sound'
    ];

    protected $visible = [
        'id',
        'name', 
        'wallet_address',
        'soil_image',
        'wallet_image',
        'mining_sound',
        'shortcode',
        'spawns'
    ];
}
