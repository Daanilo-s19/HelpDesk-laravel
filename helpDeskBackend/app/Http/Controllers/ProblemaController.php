<?php

namespace App\Http\Controllers;

use App\Models\tproblema;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProblemaController extends Controller
{
    public function listProblema(Request $request)
    {
        $problema = DB::table('tproblema')
            ->join('tsetor', 'tproblema.id_setor', '=', 'tsetor.id')
            ->select('tproblema.descricao', 'tproblema.id')
            ->where('tsetor.nome', $request->nomeSetor)->get();
        if ($problema)
            return response()->json($problema, 200);
        else
            return response()->json('Sem problema, irmão', 404);
    }
    //
}
