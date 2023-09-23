<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletChallenge extends Model
{
    use HasFactory;

    public function wallet() {
        return $this->belongsTo(Wallet::class);
    }

    protected $fillable = [
        'name',
        'wallet_id',
        'challenge',
        'id_address'
    ];
}
