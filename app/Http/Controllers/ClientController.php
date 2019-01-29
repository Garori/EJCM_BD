<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{

  public function create(Request $request){

    $client = new Client;
    $client->nome = $request->nome;
    $client->telefone = $request->telefone;
    $client->data_de_nascimento = $request->data_de_nascimento;
    $client->endereco = $request->endereco;
    $client->cpf = $request->cpf;
    $client->save();
    return response()->json([$client]);

  }

  public function list(){

    return Client::all();

  }

  public function update(Request $request, $id){

    $client = Client::findOrFail($id);
    if($request->nome)
      $client->nome = $request->nome;
    if($request->telefone)
      $client->telefone = $request->telefone;
    if($request->endereco)
      $client->endereco = $request->endereco;
    if($request->cpf)
      $client->cpf = $request->cpf;
    if($request->data_de_nascimento)
      $client->data_de_nascimento = $request->data_de_nascimento;
    $client->save();
    return response()->json([$client]);

  }

  public function delete($id){

    Client::destroy($id);
    return response()->json(['DELETADO']);

  }

  public function show($id){

    $client = Client::findOrFail($id);
    return response()->json([$client]);

  }
}
