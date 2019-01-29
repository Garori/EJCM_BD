<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/clientes', 'ClientController@create');

Route::post('/livros', 'LivroController@create');

Route::get('/clientes', 'ClientController@list');

Route::get('/livros', 'LivroController@list');

Route::put('/clientes/{id}', 'ClientController@update');

Route::put('/livros/{id}', 'LivroController@update');

Route::delete('/clientes/{id}', 'ClientController@destroy');

Route::delete('/livros/{id}', 'LivroController@destroy');
