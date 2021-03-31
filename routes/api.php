<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DirertorioController;
use App\Http\Controllers\Nivel_rutinaController;
use App\Http\Controllers\RutinasController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/users',  [UserController::class, 'store']);
Route::post('/login',  [UserController::class, 'login']);


Route::group(['middleware' => 'auth:api'], function () {
    Route::ApiResource('directorios', DirertorioController::class);
    Route::ApiResource('/nivelrutina', Nivel_rutinaController::class);
    Route::ApiResource('/rutinas', RutinasController::class);
    Route::post('/logout',  [UserController::class, 'logout']);
});
