<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tsetor extends Model
{
    protected $table = 'tsetor';
    public $timestamps = false;
    protected $fillable = ['nome', 'telefone', 'email'];
    //
}
