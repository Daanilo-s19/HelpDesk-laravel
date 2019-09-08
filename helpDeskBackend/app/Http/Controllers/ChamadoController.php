<?php

namespace App\Http\Controllers;

use App\Models\talteracao;
use App\Models\tchamado;
use Illuminate\Http\Request;

class ChamadoController extends Controller
{
    private $chamado;
    public function __construct(tchamado $chamado)
    {
        $this->chamado = $chamado;
    }
    public function chamados()
    {
        return $this->chamado->all();
    }
    public function adicionarAlteracao(talteracao $alt, $id, $alteracao)
    {
        $alt->where('id_chamado', $id)->update([
            'data' => '2019-09-07',
            'descricao' => $alteracao,
        ]);
    }
    /* UM CHORO DE CADA VEZ
    public function enviarEmail(){} */
}
