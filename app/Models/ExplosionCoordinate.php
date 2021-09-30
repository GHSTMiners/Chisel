<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExplosionCoordinate extends Model
{
    use HasFactory;

    public function explosive() {
        return $this->hasOne(Explosive::class);
    }

    protected $fillable = [
        'x',
        'y'
    ];
}
