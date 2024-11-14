<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Evidencia extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = [
        'id',
        'nombre',
        'enlace',
    ];
}
