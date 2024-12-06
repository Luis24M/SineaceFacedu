<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsToMany;
class Subcomite extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = [
        'nombre',
        'usuarios',
    ];

    public function estandares(): BelongsToMany
    {
        return $this->belongsToMany(Estandar::class); 
    }

    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(User::class); 
    }
}