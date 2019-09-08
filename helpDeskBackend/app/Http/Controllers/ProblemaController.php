<?php

namespace App\Http\Controllers;

use App\Models\tproblema;
use Illuminate\Http\Request;

class ProblemaController extends Controller
{
    public function listProblema(tproblema $problema)
    {
        return $problema->all();
    }
    //
}
