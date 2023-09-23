<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rock extends Model
{
    use HasFactory;


    public function spawns() {
        return $this->hasMany(RockSpawn::class);
    }
        /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'world_id',
        'image',
        'digable',
        'explodeable',
        'lava'
    ];

    protected $visible = [
        'id',
        'name',
        'world_id',
        'image',
        'digable',
        'explodeable',
        'lava',
        'spawns'
    ];
}
