<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\HasOne;
class Estandar extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'estandares';
    protected $fillable = [
        'contextualizacion',
        'criterios',
    ];

    public function infoEstandar() : HasOne
    {
        return $this->hasOne(InfoEstandar::class);
    }
}