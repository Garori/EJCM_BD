<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emprestimo;
use App\Http\Resources\EmprestimoResource;

class EmprestimoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Emprestimo::all();
        return EmprestimoResource::collection(Emprestimo::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $emprestimo = new emprestimo;
      $emprestimo->data_de_termino= $request->data_de_termino;
      $emprestimo->data_de_inicio= $request->data_de_inicio;
      $emprestimo->fk_id_cliente= $request->fk_id_cliente;
      $emprestimo->fk_id_livro= $request->fk_id_livro;
      $emprestimo->status= $request->status;
      $emprestimo->save();
      // return response()->json([$emprestimo]);
      return new EmprestimoResource($emprestimo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $emprestimo = Emprestimo::findOrFail($id);
      // return response()->json([$emprestimo]);
      return new EmprestimoResource($emprestimo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $emprestimo = Emprestimo::findOrFail($id);
      if($request->status)
        $emprestimo->status = $request->status;
      if($request->fk_id_livro)
        $emprestimo->fk_id_livro = $request->fk_id_livro;
      if($request->fk_id_cliente)
        $emprestimo->fk_id_cliente = $request->fk_id_cliente;
      if($request->data_de_inicio)
        $emprestimo->data_de_inicio = $request->data_de_inicio;
      if($request->data_de_termino)
        $emprestimo->data_de_termino = $request->data_de_termino;
      $emprestimo->save();
        // return response()->json([$emprestimo]);
      return new EmprestimoResource($emprestimo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Emprestimo::destroy($id);
      return response()->json(['DELETADO']);
    }
}
