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
        return $tecnico->all();
    }
    public function encaminharChamado(tchamado $chamado, $id)
    {
        $chamado->find($id)->update([
            'id_setor' => tsetor::all()->random()->id,
        ]);
    }
    public function alterarSituacao(talteracao $alteracao, $chamado, $situacao)
    {
        $alteracao->where('id_chamado', $chamado)->update([
            'id_situacao' => $situacao,
        ]);
    }
    public function atenderChamado(tchamado $chamado, $id, $tecnico)
    {
        $chamado->find($id)->update([
            'id_tecnico' => $tecnico,
        ]);
    }

    //
}
