<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Estandar extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'estandares';
    protected $fillable = [
        'contextualizacion',
        'criterios',
        'info_estandar_id'  // Asegúrate de tener este campo
    ];

    public function infoEstandar(): BelongsTo
    {
        return $this->belongsTo(InfoEstandar::class);
    }
}