<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PapeleriaModel extends Model
{
    protected $table = "tblpapeleria";

    protected $fillable = [
        'descripcion',
        'cantidad',
        'solicitante',
        'fecha',
        'observaciones',
        'estado',
    ];
}
