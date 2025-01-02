<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\DepartamentosModel;
use App\Models\BitacoraModel;
use Illuminate\Foundation\Auth\User as Authenticatable;  

class UsuariosModel extends Authenticatable
{
    use HasFactory;
    
    protected $table = "tblusuarios";

    protected $fillable = [
        'id_departamento',
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'usuario',
        'contrasena',
        'estado'
    ];

    public function departamento()
    {
        return $this->belongsTo(DepartamentosModel::class, 'id_departamento', 'id');
    }

    public function bitacora()
    {
        return $this->hasMany(BitacoraModel::class, 'id_usuario_atiende', 'id');
    }
}

