<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FallThroughLayer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'world_id',
        'layer'
    ];

    protected $visible = [
        'layer'
    ];

}
