<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsToMany;

class Programa extends Model
{
    //
    protected $connection = 'mongodb';
    protected  $fillable=[
        'nombre',
        'adminPrograma',
        'subcomites',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'adminPrograma', '_id');
    }

    public function subcomites(): BelongsToMany
    {
        return $this->belongsToMany(Subcomite::class);
    }
}
