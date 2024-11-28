<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\EvidenciasApiController;
use App\Http\Controllers\CriterioApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::resource('usuario', UsuarioController::class)->only([
//    'store'
//]);

/*RUTAS USER*/ 
Route::get('test',[UserApiController::class,'test'])->name('test');

Route::post('nuser',[UserApiController::class,'create'])->name('nuser');

/*RUTAS EVIDENCIAS */
Route::get('evidencias',[EvidenciasApiController::class,'index'])->name('evidencias');
Route::post('evidencia',[EvidenciasApiController::class,'create'])->name('nevidencia');

/*RUTA CRITERIOS*/
Route::post('criterio',[CriterioApiController::class,'create'])->name('ncriterio');