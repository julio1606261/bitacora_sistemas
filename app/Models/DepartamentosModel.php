<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UsuariosModel;
use App\Models\BitacoraModel;

class DepartamentosModel extends Model
{
    use HasFactory;
    
    protected $table = "tbldepartamentos";

    protected $fillable = [
        'nombre',
        'estado'
    ];

    public function usuario_departamento()
    {
        return $this->hasMany(UsuariosModel::class, 'id_departamento', 'id');
    }

    public function bitacora_departamento()
    {
        return $this->hasMany(BitacoraModel::class, 'id_area_atendida', 'id');
    }
}
