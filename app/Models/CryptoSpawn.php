<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoSpawn extends Model
{
    use HasFactory;

    public function crypto() {
        return $this->belongsTo(Crypto::class);
    }

    protected $fillable = [
        'world_id',
        'crypto_id',
        'starting_layer',
        'ending_layer',
        'spawn_rate'
    ];

    protected $visible = [
        'id', 
        'crypto_id', 
        'starting_layer',
        'ending_layer',
        'spawn_rate'
    ];
}
