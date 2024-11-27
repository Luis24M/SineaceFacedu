<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UserApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::resource('usuario', UsuarioController::class)->only([
//    'store'
//]);

Route::get('test',[UserApiController::class,'test'])->name('test');

Route::post('nuser',[UserApiController::class,'create'])->name('nuser');


