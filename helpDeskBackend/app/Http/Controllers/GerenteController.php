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

    public function cadastrarProblema(Request $request)
    {
        if ($request->all())
            return response()->json($this->problema->create($request->all(), 200));
        else
            return response()->json('with data', 404);
    }


    public function alterarProblema(Request $request, $id)
    {
        return response()->json($this->problema->find($id)->update($request->all()), 200);
    }


    public function removerProblema($id)
    {
        return response()->json($this->problema->find($id)->delete(), 200);
    }


    public function cadastrarTecnico(Request $request)
    {
        if ($request->all())
            return response()->json($this->tecnico->create($request->all(), 200));
        else
            return response()->json($request->all(), 401);
    }


    public function alterarTecnico(Request $request, $id)
    {
        if ($request->all())
            return response()->json($this->tecnico->where('login', $id)->update($request->all()), 200);
        else
            return response()->json('Not data', 401);
    }



    public function removerTecnico($id)
    {
        return response()->json($this->tecnico->where('login', $id)->delete(), 200);
    }
    //
}
