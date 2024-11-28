<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminPrograma extends Model
{
    //
    protected $connection = 'mongodb';
    protected $filliable =[
        'name',
        'lastname',
        'email',
        'password',
    ];
}
