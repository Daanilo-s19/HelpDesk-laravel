<?php

namespace App\Http\Controllers;

use App\Models\talteracao;
use App\Models\tchamado;
use Illuminate\Http\Request;

class ChamadoController extends Controller
{
    private $chamado;
    private $alteracao;
    public function __construct(tchamado $chamado, talteracao $alteracao)
    {
        $this->chamado = $chamado;
        $this->alteracao = $alteracao;
    }
    public function chamados()
    {
        return response()->json($this->chamado->get(), 200);
    }
    public function adicionarAlteracao(Request $request)
    {
        return response()->json($this->alteracao->create($request->all(), 200));


        /* $alt->where('id_chamado', $id)->update([
            'data' => '2019-09-07',
            'descricao' => $alteracao,
        ]);*/
    }
    /* UM CHORO DE CADA VEZ
    public function enviarEmail(){} */
}
