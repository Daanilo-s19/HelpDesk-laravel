<?php

namespace App\Http\Controllers;

use App\Models\talteracao;
use App\Models\tchamado;
use App\Models\tsetor;
use App\Models\ttecnico;
use App\Models\tusuario;
use Illuminate\Http\Request;


class ChamadoController extends Controller
{
    private $chamado;
    private $alteracao;
    private $tecnico;
    private $setor;
    private $usuario;

    public function __construct(tchamado $chamado, talteracao $alteracao, ttecnico $tecnico, tsetor $setor, tusuario $usuario)
    {
        $this->chamado = $chamado;
        $this->alteracao = $alteracao;
        $this->tecnico = $tecnico;
        $this->setor = $setor;
        $this->usuario = $usuario;
    }
    public function chamados()
    {
        $called = [];
        foreach ($this->chamado->all() as $chamado) {
            array_push($called, [
                'id' => $chamado->id,
                'data' => $chamado->data,
                'ti' => $chamado->ti,
                'tombo' => $chamado->tombo,
                'descricao' => $chamado->descricao,
                'tecnico' => $this->tecnico->where('login', $chamado->id_tecnico)->get(),
                'usuario' => $this->usuario->where('cpf', $chamado->id_usuario)->get(),
                'setor' =>  $this->setor->where('id', $chamado->id_setor)->get(),

            ]);
        }
        return response()->json($called, 200);
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
