<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiKeyIp extends Model
{
    use HasFactory;

    public function apiKey() {
        return $this->belongsTo(ApiKey::class);
    }

    protected $fillable = [
        'ip',
        'api_key_id'
    ];
}
