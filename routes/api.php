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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-inicio/{id}/{nombre}','InicioController@inicio');

Route::get('/get-metodo/{id}/{nombre}','InicioController@inicio2');

Route::get('/get-producto','InicioController@getProducto');

Route::get('/get-filtroProducto/{nombre}','InicioController@filtroProducto');

Route::get('/get-filtroProducto2/{nombre}/{id}','InicioController@filtroProducto2');

Route::get('/get-innerProducto','InicioController@inner');

Route::post('/post-producto','InicioController@saveProduct');