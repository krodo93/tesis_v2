<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boletas extends Model
{
    protected $fillable = [
        'factura',
        'usuario_id',
        'camion_id',
        'fecha_hora',
        'conductor_id',
        'notas',
        'turno'
    ];
}
