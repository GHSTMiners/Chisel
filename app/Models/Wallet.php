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

    public static function create(array $attributes = []) {
        $model = static::query()->create($attributes);

        //Create role
        \App\Models\WalletRole::create([
            'wallet_id' => $model->id,
            'admin' => $attributes['admin'],
            'developer' => $attributes['developer'],
            'moderator' => $attributes['moderator']
        ]);
    }
}
