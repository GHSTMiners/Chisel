<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gotchi extends Model
{
    use HasFactory;

    protected $fillable = [
        'gotchi_id'
    ];

    protected $visible = ['gotchi_id'];

}
