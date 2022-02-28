<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletRole extends Model
{
    use HasFactory;
    protected $fillable = [
        'wallet_id',
        'admin',
        'developer',
        'moderator'
    ];
}
