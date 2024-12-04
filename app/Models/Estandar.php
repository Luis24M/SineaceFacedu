<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\BSON\ObjectId;

class Estandar extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'estandares';
    protected $fillable = [
        'infoestandar',
        'contextualizacion',
        'criterios',
    ];

}
