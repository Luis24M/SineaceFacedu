<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Contextualizacion extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = [
        'id',
        'brechas',
        'planMejora',
        'narrativa',
    ];
}
