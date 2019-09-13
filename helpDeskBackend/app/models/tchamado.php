<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tchamado extends Model
{
    protected $table = 'tchamado';
    protected $fillable = ['descricao', 'data', 'ti', 'tombo', 'id_tecnico', "id_usuario", 'id_setor', 'id_problema'];
    public $timestamps = false;

    //protected $guarded = ['updated_at'];
    //
}
