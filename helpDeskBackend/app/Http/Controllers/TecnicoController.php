<?php

namespace App\Http\Controllers;

use App\Models\talteracao;
use App\Models\tsetor;
use App\Models\tchamado;
use App\Models\tsituacao;
use App\Models\ttecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    public function listTecnicos(ttecnico $tecnico)
    {
        return response()->json($tecnico->all(), 200);
    }


    public function encaminharChamado(Request $request, tchamado $chamado, $idChamado)
    {
        if ($request->id_setor)
            return response()->json($chamado->find($idChamado)->update($request->all()), 200);
        else
            return response()->json('Not data', 401);
    }


    public function alterarSituacao(Request $request, talteracao $alteracao, $chamado)
    {
        if ($request->id_situacao)
            return response()->json($alteracao->where('id_chamado', $chamado)->update($request->all()), 200);
        else
            return response()->json('Not data', 401);
    }


    public function atenderChamado(Request $request, tchamado $chamado, $idChamado)
    {
        if ($request->id_tecnico)
            return response()->json($chamado->find($idChamado)->update($request->all()), 200);
        else
            return response()->json('Without changes', 401);
    }

    //
}
