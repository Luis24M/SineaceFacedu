<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\HasOne;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;

class Contextualizacion extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'contextualizaciones';
    protected $fillable = [
        'planesMejora',
    ];

    public function narrativa(): HasOne
    {
        return $this->hasOne(Narrativa::class);
    }
    
    public function problematicas(): HasMany
    {
        return $this->hasMany(Problematica::class);
    }

    public function estandar():BelongsTo{
        return $this->belongsTo(Estandar::class);
    }
}
