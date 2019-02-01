<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmprestimoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
          'status'=> $this->status,
          'data_de_inicio' => $this->data_de_inicio,
          'data_de_termino' => $this->data_de_termino,
        ];
    }
}
