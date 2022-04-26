<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpgradeVitalEffect extends Model
{
    use HasFactory;

    protected $fillable = [
        'upgrade_id',
        'vital_id',
        'formula'
    ];

    protected $visible = [
        'id', 
        'vital_id', 
        'formula'
    ];
}
