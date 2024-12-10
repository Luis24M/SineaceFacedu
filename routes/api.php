<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\EvidenciasApiController;
use App\Http\Controllers\CriterioApiController;
use App\Http\Controllers\InfoEstandarApiController;
use App\Http\Controllers\EstandarApiController ;
use App\Http\Controllers\ContextualizacionApiController;
use App\Http\Controllers\SubcomiteApiController;
use App\Http\Controllers\ProgramaApiController;
use App\Http\Controllers\NarrativaController;

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
Route::get('criterios',[CriterioApiController::class,'index'])->name('criterios');
Route::post('criterio',[CriterioApiController::class,'create'])->name('ncriterio');
Route::get('criterio',[CriterioApiController::class,'test'])->name('test');

/*RUTA ESTANDARES */
Route::get('estandares',[EstandarApiController::class,'index'])->name('estandares');
Route::post('estandar',[EstandarApiController::class,'create'])->name('estandar');

/*RUTA INFOESTANDAR */
Route::get('infoestandares', [InfoEstandarApiController::class, 'index'])->name('infoestandares.index');
Route::post('infoestandar', [InfoEstandarApiController::class, 'create'])->name('infoestandares.create');

/*RUTA ESTANDARES */
Route::get('estandares',[EstandarApiController::class,'index'])->name('estandares');
Route::post('estandar',[EstandarApiController::class,'create'])->name('estandar');
Route::post('testestandar',[EstandarApiController::class,'test'])->name('testestandar');
#Route::get('estandar/{estandar}',[EstandarApiController::class,'store'])->name('estandareEspecifico');
Route::get('estandar/{id}', [EstandarApiController::class, 'show'])->name('estandareEspecifico');


/*RUTA SUBCOMITES */
Route::get('subcomites',[SubcomiteApiController::class,'index'])->name('subcomites');
Route::post('subcomite',[SubcomiteApiController::class,'create'])->name('subcomite');

/*RUTA PROGRAMAS */
Route::get('programas',[ProgramaApiController::class,'index'])->name('programas');
Route::post('programa',[ProgramaApiController::class,'create'])->name('programa');

/*RUTA PROGRAMAS */
Route::get('narrativas',[NarrativaController::class,'index'])->name('narrativas');
#Route::post('programa',[ProgramaApiController::class,'create'])->name('programa');