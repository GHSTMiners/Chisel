<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameLogEntry extends Model
{
    use HasFactory;

    public function game() {
        return $this->belongsTo(Game::class);
    }


    protected $fillable = [
        'game_id',
        'log_file',
    ];

    protected $visible = ['log_file'];

}
