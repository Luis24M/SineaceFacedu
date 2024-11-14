<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Criterio extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = [
        'id',
        'nombre',
        'evidencia',
    ];
}
