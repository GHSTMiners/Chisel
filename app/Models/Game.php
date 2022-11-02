<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function world() {
        return $this->belongsTo(World::class);
    }

    public function server_region() {
        return $this->belongsTo(ServerRegion::class);
    }

    public function statistic_entries() {
        return $this->hasMany(GameStatisticEntry::class);
    }

    public function log_entry() {
        return $this->hasOne(GameLogEntry::class);
    }

    protected $fillable = [
        'room_id',
        'world_id',
        'server_region_id',
        'statistic_entries',
        'log_entry'
    ];

    protected $visible = ['room_id', 'statistic_entries', 'log_entry'];
}
