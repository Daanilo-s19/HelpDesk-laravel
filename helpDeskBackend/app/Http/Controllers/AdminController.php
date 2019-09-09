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


    public function cadastrarSetor(Request $request)
    {
        if ($request->all())
            return response()->json($this->setor->create($request->all()), 201);
        else
            return response()->json('Error', 401);
    }


    public function alterarSetor(Request $request, $id)
    {
        if ($request->all())
            return response()->json($this->setor->find($id)->update($request->all()), 200);
        else
            return response()->json('Not data', 401);
    }


    public function removerSetor($id)
    {
        return response()->json($this->setor->find($id)->delete(), 200);
    }



    public function cadastrarGerente(Request $request)
    {

        if ($request->all())
            return response()->json($this->tecnico->create($request->all()), 201);
        else
            return response()->json('Error', 401);
    }


    public function alterarGerente(Request $request, $id)
    {
        if ($request->all())
            return response()->json($this->tecnico->where('login', $id)->update($request->all()), 200);
        else
            return response()->json('Not data', 401);
    }


    public function removerGerente($id)
    {
        return response()->json($this->tecnico->where('login', $id)->delete(), 200);
    }
    //
}
