<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
  return "Olá EJCM!!!";
});

Route::get('servicos', function(){
  return "O serviço de Fulano é muito bom. <br><br>Gostou?<a href='".url('contato')."'> Esse é o contato dele.</a>";
});


Route::get('servicos/{id}', function($id){
  return "O serviço do ".$id." é muito bom.";
});
