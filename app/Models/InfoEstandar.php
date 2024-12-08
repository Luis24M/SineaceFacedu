<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\HasMany;

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

    public function estandares() : HasMany{
        return $this->hasMany(Estandar::class);
    }
    
}

