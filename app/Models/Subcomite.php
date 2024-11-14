<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcomite extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = [
        'nombre',
        'estandares',
        'usuarios',
    ];
}
