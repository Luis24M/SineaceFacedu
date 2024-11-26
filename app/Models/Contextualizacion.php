<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Contextualizacion extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = [
        'brechas',
        'planesMejora',
        'narrativa',
    ];

    public function actualizarNarrativa($narrativa)
    {
        $this->narrativa = $narrativa;
        $this->save();
    }

}
