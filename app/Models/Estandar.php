<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\HasOne;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Relations\BelongsTo;

class Estandar extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'estandares';

    public function infoEstandar(): HasOne
    {
        return $this->HasOne(InfoEstandar::class);
    }

    public function contextualizacion(): HasOne{
        return $this->hasOne(Contextualizacion::class);
    }

    public function criterios(): HasMany{
        return $this->hasMany(Criterio::class);
    }

    public function subcomite(): BelongsTo{
        return $this->belongsTo(Subcomite::class);
    }
}