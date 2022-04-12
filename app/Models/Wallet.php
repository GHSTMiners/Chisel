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

    protected $visible = ['address', 'chain_id'];

    public static function create(array $attributes = []) {
        $model = static::query()->create($attributes);

        //Fill attributes if they are empty
        if(!array_key_exists('admin', $attributes)) $attributes['admin'] = FALSE;
        if(!array_key_exists('developer', $attributes)) $attributes['developer'] = FALSE;
        if(!array_key_exists('moderator', $attributes)) $attributes['moderator'] = FALSE;

        //Create role
        \App\Models\WalletRole::create([
            'wallet_id' => $model->id,
            'admin' => $attributes['admin'],
            'developer' => $attributes['developer'],
            'moderator' => $attributes['moderator']
        ]);

        return $model;
    }
}
