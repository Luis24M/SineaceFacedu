<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Relations\BelongsTo;

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

    public function contextualizacion(): BelongsTo{
        return $this->belongsTo(Contextualizacion::class);
    }

}
