<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Relations\BelongsTo;
class Subcomite extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = [
        'nombre'
    ];

    public function estandares(): HasMany
    {
        return $this->hasToMany(Estandar::class); 
    }

    public function usuarios(): HasMany
    {
        return $this->hasToMany(User::class); 
    }

    public function programa():BelongsTo{
        return $this->belongsTo(Programa::class,'programa');
    }
}