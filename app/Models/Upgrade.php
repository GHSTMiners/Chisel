<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upgrade extends Model
{
    use HasFactory;

    public function prices() {
        return $this->hasMany(UpgradePrice::class);
    }

    public function skill_effects() {
        return $this->hasMany(UpgradeSkillEffect::class);
    }

    public function vital_effects() {
        return $this->hasMany(UpgradeVitalEffect::class);
    }

    protected $fillable = [
        'name',
        'world_id',
        'description'
    ];

    protected $visible = ['id', 'name', 'description', 'prices', 'skill_effects', 'vital_effects'];

}
