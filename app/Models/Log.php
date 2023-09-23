<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    public function ipAddress() {
        return $this->belongsTo(IpAddress::class);
    }

    public function gotchi() {
        return $this->belongsTo(Gotchi::class);
    }

    public function wallet() {
        return $this->belongsTo(Wallet::class);
    }

    protected $fillable = [
        'score',
        'event',
        'ip_address_id',
        'gotchi_id',
        'wallet_id'
    ];
}
