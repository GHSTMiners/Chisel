<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soil extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'world_id',
        'layers',
        'dig_multiplier',
        'top_image',
        'middle_image',
        'bottom_image',
        'order'
    ];

    protected $visible = [
        'id', 
        'name',
        'layers',
        'dig_multiplier',
        'top_image',
        'middle_image',
        'bottom_image',
        'order'
    ];
}
