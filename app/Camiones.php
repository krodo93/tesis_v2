<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camiones extends Model
{
    protected $fillable = [
        'descripcion',
        'color',
        'placa',
        'marca_id'
       
    ];
}
