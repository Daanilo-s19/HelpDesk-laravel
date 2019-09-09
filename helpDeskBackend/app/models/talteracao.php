<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class talteracao extends Model
{
    protected $table = 'talteracao';
    protected $fillable = ['data', 'descricao', 'id_tecnico', 'id_chamado', 'id_situacao', 'id_prioridade'];

    public $timestamps = false;

    //
}
