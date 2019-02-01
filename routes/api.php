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

Route::post('/clientes', 'ClientController@create')->name('cadastrar_cliente');

Route::post('/livros', 'LivroController@create')->name('cadastrar_livro');

Route::get('/clientes', 'ClientController@list')->name('listar_clientes');

Route::get('/livros', 'LivroController@list')->name('listar_livros');

Route::put('/clientes/{id}', 'ClientController@update')->name('atualizar_cliente');

Route::put('/livros/{id}', 'LivroController@update')->name('atualizar_livro');

Route::delete('/clientes/{id}', 'ClientController@delete')->name('apagar_cliente');

Route::delete('/livros/{id}', 'LivroController@delete')->name('apagar_livro');

Route::get('/clientes/{id}', 'ClientController@show')->name('ver_cliente');

Route::get('/livros/{id}', 'ClientController@show')->name('ver_livro');

Route::apiResource('emprestimos', 'EmprestimoController');
