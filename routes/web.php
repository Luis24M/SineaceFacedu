<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstandarController;
use App\Http\Controllers\ProblematicaController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\EvidenciasApiController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubcomiteController;

Route::get('/', [HomeController::class, 'redirect'])->name('usuario.home')->middleware('auth');
Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('pdf');
Route::middleware(['auth', 'role:user'])->group(function () {
  Route::controller(EstandarController::class)->group(function () {
    Route::get('/estandar/{estandar}', 'index')->name('estandar.index');
    Route::get('/estandar/{estandar}/narrativa', 'index')->name('estandar.narrativa');
    Route::get('/estandar/{estandar}/brechas', 'index')->name('estandar.brechas');
    Route::get('/estandar/{estandar}/planMejora', 'index')->name('estandar.planMejora');
    Route::post('/estandar/{estandar}/programa', 'actualizarNarrativaPrograma')->name('estandar.actualizarNarrativaPrograma');
    Route::post('/estandar/{estandar}/descripcion', 'actualizarNarrativaDescripcion')->name('estandar.actualizarNarrativaDescripcion');
  });
  Route::post('/problematica/{narrativa}/{contextualizacion}', [ProblematicaController::class, 'store'])->name('problematica.store');
  Route::put('/problematica/{problematica}', [ProblematicaController::class, 'update'])->name('problematica.update');
});

Route::middleware(['auth','role:admin'])->group(function (){
  Route::post('/crearPrograma',[HomeController::class,'CrearPrograma'])->name('home.crearPrograma');
  Route::post('/asignarMision',[HomeController::class,'AsignarMision'])->name('home.asignarMision');
});

Route::middleware(['auth', 'role:adminPrograma'])->group(function (){
  Route::get('/subcomite/{subcomite}', [SubcomiteController::class, 'show'])->name('subcomite.show');
  Route::get('/usuarios', [HomeController::class, 'usuarios'])->name('usuarios');
  Route::post('/usuarios', [HomeController::class, 'crearUsuario'])->name('usuarios.crear');
  Route::put('/usuarios/{usuario}', [UserController::class, 'update'])->name('usuarios.update');
  Route::delete('/usuario/{usuario}', [UserController::class, 'destroy'])->name('usuario.destroy');
});

Auth::routes();
route::get('/test',[EvidenciasApiController::class,'test'])->name('token');
Route::post('/images', [EvidenciasApiController::class, 'store'])->name('images.store');

Route::resource('files',EvidenciasApiController::class);
