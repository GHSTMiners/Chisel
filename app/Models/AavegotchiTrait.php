<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AavegotchiTrait extends Model
{
    use HasFactory;

    protected $fillable = [
        'short_name',
        'name',
        'blockchain_index'
    ];
}
