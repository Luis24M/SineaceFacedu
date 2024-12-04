<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class InfoEstandar extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'infoestandares';
    protected $fillable = [
        'titulo',
        'factor',
        'dimension',
        'descripcion',
        'indice'
    ];
}

