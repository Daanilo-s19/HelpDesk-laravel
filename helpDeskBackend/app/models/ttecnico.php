<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ttecnico extends Model
{
    protected $table = 'ttecnico';
    public $timestamps = false;
    protected $fillable = ['login', 'nome', 'email', 'telefone', 'id_setor', 'cargo'];


    //
}
