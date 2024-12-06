<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\HasMany;

class Narrativa extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = [
        'misionUNT',
        'misionFacultad',
        'misionPrograma',
    ];

    public function problematicas(): HasMany
    {
        return $this->hasMany(Problematica::class);
    }

}
