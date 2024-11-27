<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
