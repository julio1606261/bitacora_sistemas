<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolpedModel extends Model
{
    protected $table = "tblsolped";

    protected $fillable = [
        'id_usuario',
        'descripcion',
        'solped',
        'pedido',
        'entrada',
        'observaciones',
        'solicitante',
        'estado',
        'fecha_entrega',
        'um',
        'cantidad',
        'total'
    ];
}
