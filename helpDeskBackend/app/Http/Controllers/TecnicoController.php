<?php

namespace App\Http\Controllers;

use App\Models\talteracao;
use App\Models\tsetor;
use App\Models\tchamado;
use App\Models\tsituacao;
use App\Models\ttecnico;
use App\Models\tusuario;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    private $tecnico;
    private $chamado;
    private $usuario;
    private $setor;
    private $situacao;
    private $alteracao;
    public function __construct(tchamado $chamado, ttecnico $tecnico, talteracao $alteracao, tusuario $usuario, tsetor $setor, tsituacao $situacao)
    {
        $this->tecnico = $tecnico;
        $this->chamado = $chamado;
        $this->usuario = $usuario;
        $this->setor = $setor;
        $this->situacao = $situacao;
        $this->alteracao = $alteracao;
    }
    public function listTecnicos(ttecnico $tecnico)
    {
        return response()->json($tecnico->all(), 200);
    }


    public function encaminharChamado(Request $request)
    {
        $called = [];
        $calledAlt = [];
        $hoje = Carbon::now();

        if ($this->chamado->where('id', $request->id_chamado)
            ->update(['id_setor' => $this->setor->where('nome', $request->setor)->get()->max('id')])
        ) {
            foreach ($this->chamado->where('id', $request->id_chamado)->get() as $chamado) {
                array_push($called, [
                    'id' => $chamado->id,
                    'data' => $chamado->data,
                    'ti' => $chamado->ti,
                    'tombo' => $chamado->tombo,
                    'descricao' => $chamado->descricao,
                    'QtdDias' => $hoje->diffInDays($chamado->data),
                    'situacao' => DB::table('talteracao')
                        ->join('tsituacao', 'tsituacao.id', '=', 'talteracao.id_situacao')
                        ->select('tsituacao.nome')->where('talteracao.id_chamado', $chamado->id)
                        ->orderBy('talteracao.id', 'desc')->get()->max('nome'),
                    'tecnico' => $this->tecnico->where('login', $chamado->id_tecnico)->get(),
                    'usuario' => $this->usuario->where('cpf', $chamado->id_usuario)->get(),
                    'setor' =>  $this->setor->where('id', $chamado->id_setor)->get(),

                ]);
            }
            $calledAlt = [
                'data' => $hoje,
                'descricao' => 'Encaminhamento do chamado para o setor ' . $request->setor,
                'id_tecnico' =>  $this->alteracao->where('id_chamado', $request->id_chamado)->get()->max('id_tecnico'),
                'id_chamado' => $request->id_chamado,
                'id_situacao' => $this->alteracao->where('id_chamado', $request->id_chamado)->get()->max('id_situacao'),
                'id_prioridade' => $this->alteracao->where('id_chamado', $request->id_chamado)->get()->max('id_prioridade')
            ];
            $this->alteracao->create($calledAlt);
            return response()->json($called, 200);
        } else
            return response()->json('Não Autorizado', 404);
    }


    public function alterarSituacao(Request $request)
    {
        $called = [];
        $hoje = Carbon::now();
        $CalledUp = $this->alteracao->where('id_chamado', $request->id_chamado)->update(['id_prioridade' => $request->prioridade]);
        if ($CalledUp) {
            $called = [
                'data' =>   $hoje,
                'descricao' => 'Prioridade do chamado alterada',
                'id_tecnico' => $this->alteracao->where('id_chamado', $request->id_chamado)->get()->max('id_tecnico'),
                'id_chamado' => $this->alteracao->where('id_chamado', $request->id_chamado)->get()->max('id_chamado'),
                'id_situacao' => $this->alteracao->where('id_chamado', $request->id_chamado)->get()->max('id_situacao'),
                'id_prioridade' => $request->prioridade,
            ];
            return response()->json($this->alteracao->create($called), 200);
        } else
            return response()->json('erro', 404);
    }


    public function atenderChamado(Request $request)
    {
        $called = [];
        $hoje = Carbon::now();
        if ($this->tecnico->where('login', $request->login)->where('senha', $request->senha)->get()) {
            response()->json($this->chamado->where('id', $request->id_chamado)->update(['id_tecnico' => $request->login]), 200);

            foreach ($this->chamado->where('id', $request->id_chamado)->get() as $chamado) {
                array_push($called, [
                    'id' => $chamado->id,
                    'data' => $chamado->data,
                    'ti' => $chamado->ti,
                    'tombo' => $chamado->tombo,
                    'descricao' => $chamado->descricao,
                    'QtdDias' => $hoje->diffInDays($chamado->data),
                    'situacao' => DB::table('talteracao')
                        ->join('tsituacao', 'tsituacao.id', '=', 'talteracao.id_situacao')
                        ->select('tsituacao.nome')->where('talteracao.id_chamado', $chamado->id)
                        ->orderBy('talteracao.id', 'desc')->get()->max('nome'),
                    'tecnico' => $this->tecnico->where('login', $chamado->id_tecnico)->get(),
                    'usuario' => $this->usuario->where('cpf', $chamado->id_usuario)->get(),
                    'setor' =>  $this->setor->where('id', $chamado->id_setor)->get(),

                ]);
            }

            return response()->json($called, 200);
        } else
            return response()->json('Não Autorizado', 404);
    }

    public function definirTombo(Request $request)
    {
        $called = [];
        $hoje = Carbon::now();
        $CalledUp = $this->chamado->where('id', $request->id_chamado)->update(['tombo' => $request->tombo]);
        if ($CalledUp) {
            $called = [
                'data' =>   $hoje,
                'descricao' => 'Definição do Tombamento',
                'id_tecnico' => $this->alteracao->where('id_chamado', $request->id_chamado)->get()->max('id_tecnico'),
                'id_chamado' => $request->id_chamado,
                'id_situacao' => $this->alteracao->where('id_chamado', $request->id_chamado)->get()->max('id_situacao'),
                'id_prioridade' => $this->alteracao->where('id_chamado', $request->id_chamado)->get()->max('id_prioridade')
            ];
            return response()->json($this->alteracao->create($called), 200);
        } else
            return response()->json('erro', 404);
    }
    public function informacaoChamado(Request $request)
    {
        $called = [];
        $hoje = Carbon::now();
        $CalledUp = $this->chamado->where('id', $request->id_chamado)->update(['descricao' => $request->alteracoes]);
        if ($CalledUp) {
            $called = [
                'data' =>   $hoje,
                'descricao' =>  $request->alteracoes,
                'id_tecnico' => $this->alteracao->where('id_chamado', $request->id_chamado)->get()->max('id_tecnico'),
                'id_chamado' => $this->alteracao->where('id_chamado', $request->id_chamado)->get()->max('id_chamado'),
                'id_situacao' => $this->alteracao->where('id_chamado', $request->id_chamado)->get()->max('id_situacao'),
                'id_prioridade' => $this->alteracao->where('id_chamado', $request->id_chamado)->get()->max('id_prioridade')
            ];
            return response()->json($this->alteracao->create($called), 200);
        } else
            return response()->json('erro', 404);
    }

    //
}
