<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameStatisticEntry extends Model
{
    use HasFactory;

    public function game() {
        return $this->belongsTo(Game::class);
    }

    public function gotchi() {
        return $this->belongsTo(Gotchi::class);
    }

    public function wallet() {
        return $this->belongsTo(Wallet::class);
    }

    public function category() {
        return $this->belongsTo(GameStatisticCategory::class);
    }

    protected $fillable = [
        'game_id',
        'gotchi_id',
        'wallet_id',
        'game_statistic_category_id',
        'value'
    ];

    protected $visible = ['value', 'gotchi', 'wallet', 'game_statistic_category_id'];

}
