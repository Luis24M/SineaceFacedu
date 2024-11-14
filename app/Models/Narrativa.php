<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Narrativa extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = [
        'id',
        'criterio',
    ];
}
