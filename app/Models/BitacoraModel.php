<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UsuariosModel;
use App\Models\DepartamentosModel;

class BitacoraModel extends Model
{
    protected $table = "tblbitacora";

    protected $fillable = [
        'id_usuario_atiende',
        'id_area_atendida',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'amenza',
        'descripcion_evento',
        'descripcion_solucion',
    ];

    public function usuario()
    {
        return $this->belongsTo(UsuariosModel::class, 'id_usuario_atiende', 'id');
    }

    public function departamento()
    {
        return $this->belongsTo(DepartamentosModel::class, 'id_area_atendida', 'id');
    }
}
