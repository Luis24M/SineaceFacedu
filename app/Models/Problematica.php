<?php

namespace App\Models;
use MongoDB\Laravel\Eloquent\Model;

class Problematica extends Model
{
    //
    protected $connection = 'mongodb';
    protected $fillable = [
        'nombre',
        'description'
    ];
}
