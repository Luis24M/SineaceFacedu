<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Administrador extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = [
        'id',
        'nombre',
        'apellidoPa',
        'apellidoMa',
        'telefono',
        'correo',
        'contrasena',
        'tipo',
        'subcomite',
    ];
}
