<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

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
}
