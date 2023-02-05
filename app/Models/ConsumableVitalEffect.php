<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumableVitalEffect extends Model
{
    use HasFactory;

    public function consumable() {
        return $this->hasOne(Consumable::class);
    }

    public function vital() {
        return $this->belongsTo(Vital::class);
    }

    protected $fillable = [
        'consumable_id',
        'vital_id',
        'formula'
    ];
}
