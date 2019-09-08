<?php

namespace App\Http\Controllers;

use App\Models\tsetor;
use App\Models\ttecnico;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // lembrar de NÃO FAZER O CASCADE
    private $setor;
    private $tecnico;
    public function __construct(tsetor $setor, ttecnico $tecnico)
    {
        $this->setor = $setor;
        $this->tecnico = $tecnico;
    }

    public function setor()
    {
        return $this->setor->all();
    }
    public function cadastrarSetor()
    {
        $this->setor->create([
            'nome' => 'comunicação',
            'telefone' => '7778777',
            'email' => 'fake@hotmail.com',
        ]);
    }
    public function alterarSetor($id)
    {
        $this->setor->find($id)->update([
            'nome' => 'alterado',
            'telefone' => 'alt9898998',
            'email' => 'alterado@hotmail.com',
        ]);
    }
    public function removerSetor($id)
    {

        $this->setor->find($id)->delete();
    }
    public function cadastrarGerente()
    {
        $this->tecnico->create([
            'login' => 'fakedna',
            'nome' => 'dandan',
            'email' => 'dandan@hotmail.com',
            'telefone' => '989899989',
            'id_setor' => 3,
            'cargo' => 't',

        ]);
    }
    public function alterarGerente($id)
    {
        $this->tecnico->where('login', $id)->update([
            'login' => 'delete',
            'nome' => 'dandan',
            'email' => 'aaa@hotmail.com',
            'telefone' => '989899989',
            'id_setor' => 3,
            'cargo' => 't',

        ]);
    }
    public function removerGerente($id)
    {
        $this->tecnico->where('login', $id)->delete();
    }
    //
}
