<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $connection = 'mongodb';
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
    ];
}
