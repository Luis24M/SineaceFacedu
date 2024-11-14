<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('login');
});

Route::get('/home/{usuario}', [UsuarioController::class, 'index'])->name('usuario.home');

Route::post('/login', [UsuarioController::class, 'login'])->name('login');