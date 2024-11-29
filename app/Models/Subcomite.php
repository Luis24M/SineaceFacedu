<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Subcomite extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = [
        'nombre',
        'estandares',
        'usuarios',
    ];
}