<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Highscore extends Model
{

    public function gotchi() {
        return $this->belongsTo(Gotchi::class);
    }

    public function category() {
        return $this->belongsTo(GameStatisticCategory::class);
    }

    public function entry() {
        return $this->belongsTo(GameStatisticEntry::class, 'game_statistic_entry_id');
    }


    protected $fillable = [
        'entry',
        'gotchi_id',
        'game_statistic_category_id',
        'game_statistic_entry_id'
    ];

    protected $visible = ['gotchi', 'entry'];

    use HasFactory;
}
