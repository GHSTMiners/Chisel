<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
    use HasFactory;

    public function ips() {
        return $this->hasMany(ApiKeyIp::class);
    }


    protected $fillable = [
        'key', 
        'notes'
    ];
}
