<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletBan extends Model
{
    use HasFactory;
    protected $fillable = [
        'banned_until'
    ];
}
