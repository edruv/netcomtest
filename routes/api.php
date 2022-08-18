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


Route::get('/actividades',['App\Http\Controllers\ActividadController', 'index']);
Route::get('/pendientes',['App\Http\Controllers\EmpresaController', 'index']);
Route::get('/pendientes/{empresa}',['App\Http\Controllers\EmpresaController', 'show']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
