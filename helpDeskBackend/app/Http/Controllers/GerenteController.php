<?php

namespace App\Http\Controllers;

use App\Models\tproblema;
use App\Models\ttecnico;
use Illuminate\Http\Request;

class GerenteController extends Controller
{
    private $tecnico;
    private $problema;
    public function __construct(ttecnico $tecnico, tproblema $problema)
    {
        $this->tecnico = $tecnico;
        $this->problema = $problema;
    }

    public function cadastrarProblema()
    {
        $this->problema->create([
            'descricao' => ' pmeu problema é a vida',
            'id_setor' => '4',

        ]);
    }
    public function alterarProblema($id)
    {
        $this->problema->find($id)->update([
            'descricao' => 'jesus',
            'id_setor' => '4',

        ]);
    }
    public function removerProblema($id)
    {
        $this->problema->find($id)->delete();
    }
    public function cadastrarTecnico()
    {
        $this->tecnico->create([
            'login' => 'tec',
            'nome' => 'dandan',
            'email' => 'tec@hotmail.com',
            'telefone' => '989899989',
            'id_setor' => 3,
            'cargo' => 't',

        ]);
    }
    public function alterarTecnico($id)
    {
        $this->tecnico->where('login', $id)->update([
            'login' => 'delete',
            'nome' => 'd',
            'email' => 'aaad@hotmail.com',
            'telefone' => '989899989',
            'id_setor' => 3,
            'cargo' => 't',

        ]);
    }

    public function removerTecnico($id)
    {
        $this->tecnico->where('login', $id)->delete();
    }
    //
}
