<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('empresa')->group(function(){
	Route::get('/',['App\Http\Controllers\EmpresaController', 'index']);
});

Route::prefix('actividad')->group(function(){
	Route::get('pendientes',['App\Http\Controllers\ActividadController', 'index']);
	Route::post('/',['App\Http\Controllers\ActividadController', 'store']);

	Route::post('asignacion',['App\Http\Controllers\ActividadController', 'asignar']);
	Route::post('estatus/update',['App\Http\Controllers\ActividadController', 'updateStatus']);
});
