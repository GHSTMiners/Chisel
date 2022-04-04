<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function World() {
        return $this->belongsTo(World::class);
    }

    protected $fillable = [
        'room_id',
        'world_id'
    ];
}
