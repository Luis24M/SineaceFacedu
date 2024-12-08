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
        'description'
    ];

    public function narrativa():BelongsTo{
        return $this->belongsTo(Narrativa::class);
    }
}
