<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstandarController;
use App\Http\Controllers\ProblematicaController;

Route::get('/', [HomeController::class, 'redirect'])->name('usuario.home')->middleware('auth');

Route::middleware(['auth', 'role:user'])->group(function () {
  Route::controller(EstandarController::class)->group(function () {
    Route::get('/estandar/{estandar}', 'index')->name('estandar.index');
    Route::get('/estandar/{estandar}/narrativa', 'index')->name('estandar.narrativa');
    Route::post('/estandar/{estandar}/programa', 'actualizarNarrativaPrograma')->name('estandar.actualizarNarrativaPrograma');
    Route::post('/estandar/{estandar}/descripcion', 'actualizarNarrativaDescripcion')->name('estandar.actualizarNarrativaDescripcion');
  });
  Route::post('/problematicas', [ProblematicaController::class, 'store'])->name('problematicas.store');
});

Auth::routes();
