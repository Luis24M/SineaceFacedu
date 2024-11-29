<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Estandar extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'estandares';
    protected $fillable = [
        'titulo',
        'factor',
        'dimension',
        'descripcion',
        'contextualizacion',
        'criterios',
    ];
}
