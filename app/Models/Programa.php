<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Programa extends Model
{
    //
    protected $connection = 'mongodb';
    protected  $fillable=[
        'nombre'
    ];

    public function adminPrograma(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function subcomites(): HasMany
    {
        return $this->hasMany(Subcomite::class);
    }
}
