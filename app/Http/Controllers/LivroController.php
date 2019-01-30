<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livro;

class LivroController extends Controller
{

  public function create(Request $request){

    $livro = new Livro;
    $livro->qtd_emprestada= $request->qtd_emprestada;
    $livro->qtd_estoque= $request->qtd_estoque;
    $livro->ano_de_lancamento= $request->ano_de_lancamento;
    $livro->versao= $request->versao;
    $livro->editora= $request->editora;
    $livro->autor= $request->autor;
    $livro->titulo= $request->titulo;
    $livro->save();
    return response()->json([$livro]);

  }

  public function list(){

    return Livro::all();

  }

  public function update(Request $request, $id){

    $livro = Livro::findOrFail($id);
    if($request->titulo)
      $livro->titulo = $request->titulo;
    if($request->autor)
      $livro->autor = $request->autor;
    if($request->editora)
      $livro->editora = $request->editora;
    if($request->versao)
      $livro->versao = $request->versao;
    if($request->ano_de_lancamento)
      $livro->ano_de_lancamento = $request->ano_de_lancamento;
    if($request->qtd_estoque)
      $livro->qtd_estoque = $request->qtd_estoque;
    if($request->qtd_emprestada)
      $livro->qtd_emprestada = $request->qtd_emprestada;
    $livro->save();
      return response()->json([$livro]);

  }

  public function delete($id){

    Livro::destroy($id);
    return response()->json(['DELETADO']);

  }

  public function show($id){

    $livro = Livro::findOrFail($id);
    return response()->json([$livro]);

  }

}
