<?php

namespace App\Http\Controllers;

use App\Models\tchamado;
use App\Models\tusuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    private $chamado;
    public function __construct(tchamado $chamado)
    {
        $this->chamado = $chamado;
    }



    public function cadastrarChamado(Request $request)
    {
        if ($request->all())
            return response()->json($this->chamado->create($request->all()), 201);
        else
            return response()->json('Error', 404);
    }



    public function buscarChamado($id)
    {
        return response()->json($this->chamado->where('id_usuario', $id)->get(), 200);
    }



    public function alterarChamado(Request $request, $id)
    {
        if ($request->all())
            return response()->json($this->chamado->find($id)->update($request->all()), 200);
        else
            return response()->json('Without Changes', 404);
    }


    public function cancelarChamado(Request $request, $id)
    {

        return response()->json($this->chamado->find($id)->delete(), 204);
    }

    //
    //
}
