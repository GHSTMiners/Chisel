<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpgradePrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'upgrade_id',
        'crypto_id',
        'tier_1',
        'tier_2',
        'tier_3',
        'tier_4',
        'tier_5'
    ];

    protected $visible = ['id', 'crypto_id', 'tier_1', 'tier_2', 'tier_3', 'tier_4', 'tier_5'];

}
