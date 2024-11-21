<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstandarController;

Route::get('/', [HomeController::class, 'index'])->name('usuario.home')->middleware('auth');
Route::get('/estandar/{nombre}', [EstandarController::class, 'index'])->name('estandar.index')->middleware('auth');
Route::get('/estandar/{nombre}/narrativa', [EstandarController::class, 'narrativa'])->name('estandar.narrativa')->middleware('auth');
//actualizar modelo contextualizacion
Route::post('/narrativa/{nombre}/', [EstandarController::class, 'actualizarNarrativa'])->name('estandar.actualizarNarrativa')->middleware('auth');


Route::post('/login', [UsuarioController::class, 'login'])->name('login');
Auth::routes();
