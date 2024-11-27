<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Problematica extends Model
{
    //
    protected $connection = 'mongodb';
    protected $fillable = [
        'nombre',
        'description'
    ];
}
