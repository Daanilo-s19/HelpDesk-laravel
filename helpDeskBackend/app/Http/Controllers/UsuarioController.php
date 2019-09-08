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
        return response()->json($this->chamado->create($request->all()), 201);

        /*$insert = $this->chamado->create([
            'descricao' => 'que funcione, amém ',
            'data' => '2019-07-05',
            'ti' => 0,
            'tombo' => '1111111',
            'id_tecnico' => 'test',
            'id_usuario' => '99999999999',
            'id_setor' => 1
        ]);*/
    }
    public function buscarChamado($id)
    {
        $searchCalled =  $this->chamado->where('id_usuario', $id)->get();
        if (!is_null($searchCalled))
            return  response()->json($searchCalled, 200);
        else
            return  response()->json('Not found', 404);
        /*return $this->chamado->where('id_usuario', $id)->get();*/
        //find retorna apenas pelo ID
        //WHERE retorna pela coluna desejada
    }

    /* public function alterarChamado()
    {
        $update = $this->chamado->find(4)->update([
            'descricao' => 'Isso ta muito errado também',
            'data' => '2019-07-05',
            'ti' => 0,
            'tombo' => '77777',
            'id_tecnico' => 'test',
            'id_usuario' => '99999999999',
            'id_setor' => 1
        ]);
    }*/
    public function alterarChamado(Request $request, $id)
    {
        return response()->json($this->chamado->find($id)->update($request->all()), 200);
    }
    public function cancelarChamado(Request $request, $id)
    {

        return response()->json($this->chamado->find($id)->delete(), 204);
    }

    //
    //
}
