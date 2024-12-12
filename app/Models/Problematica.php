<?php

namespace App\Models;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Problematica extends Model
{
    //
    protected $connection = 'mongodb';
    protected $fillable = [
        'nombre',
        'description',
        'planDeMejora'
    ];
    public function contextualizacion(): BelongsTo{
        return $this->belongsTo(Contextualizacion::class);
    }
}
