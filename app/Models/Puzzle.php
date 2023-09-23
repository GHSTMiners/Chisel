<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puzzle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'world_id',
        'blocks'
    ];

    protected $visible = [
        'name',
        'blocks',
    ];

    public function blocks() {
        return $this->hasMany(PuzzleBlock::class);
    }
}
