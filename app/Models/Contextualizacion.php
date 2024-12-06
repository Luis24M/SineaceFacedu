<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Contextualizacion extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'contextualizaciones';
    protected $fillable = [
        'brechas',
        'planesMejora',
    ];

    public function narrativa(): BelongsTo
    {
        return $this->belongsTo(Narrativa::class, 'narrativa');
    }
}
