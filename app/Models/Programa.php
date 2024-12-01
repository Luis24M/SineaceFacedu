<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Programa extends Model
{
    //
    protected $connection = 'mongodb';
    protected  $fillable=[
        'nombre',
        'adminPrograma',
        'subcomites',
    ];
}
