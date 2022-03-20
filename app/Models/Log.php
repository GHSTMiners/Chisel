<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    public function ipAddress() {
        return $this->hasOne(IpAddress::class);
    }

    public function gotchi() {
        return $this->hasOne(Gotchi::class);
    }

    public function wallet() {
        return $this->hasOne(Wallet::class);
    }

    protected $fillable = [
        'score',
        'event',
        'ip_address_id',
        'gotchi_id',
        'wallet_id'
    ];
}
