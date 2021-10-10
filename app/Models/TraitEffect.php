<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraitEffect extends Model
{
    use HasFactory;
    /*
    public function trait() {
        return $this->hasOne(AavegotchiTrait::class);
    }*/
    
    protected $fillable = [
        'trait_id'
    ];
}
