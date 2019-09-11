<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tusuario extends Model
{
    protected $table = 'tusuario';
    public $timestamps = false;

    protected $fillable = ['cpf', 'email', 'telefone', 'nome'];
    //
}
