<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Estandar extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = [
        'id',
        'nombre',
        'titulo',
        'factor',
        'programa',
        'dimension',
        'descripcion',
        'contextualizacion',
        'criterios',
    ];
}
