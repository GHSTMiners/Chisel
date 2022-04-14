<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameStatisticCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name'
    ];

    public function entries() {
        return $this->hasMany(GameStatisticEntry::class);
    }

    public function highscores() {
        return $this->hasMany(Highscore::class);
    }

    protected $visible = ['id', 'name'];
}
