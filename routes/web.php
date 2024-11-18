<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstandarController;

Route::get('/', function () {
    return view('login');
});

// usuario
Route::get('/home', [HomeController::class, 'index'])->name('usuario.home');
Route::get('/estandar/{nombre}', [EstandarController::class, 'index'])->name('estandar.index');
Route::post('/login', [UsuarioController::class, 'login'])->name('login');
Auth::routes();
