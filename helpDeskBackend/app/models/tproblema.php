<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tproblema extends Model
{
    protected $table = 'tproblema';
    public $timestamps = false;

    protected $fillable = ['descricao', 'id_setor'];
    //
}
