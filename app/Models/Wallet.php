<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    public function role() {
        return $this->hasOne(WalletRole::class);
    }

    public function bans() {
        return $this->hasMany(WalltBan::class);
    }

    protected $fillable = [
        'address',
        'chain_id',
    ];
}
