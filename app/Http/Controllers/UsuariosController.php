<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartamentosModel;
use App\Models\UsuariosModel;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = UsuariosModel::all();
        $departamentos = DepartamentosModel::all();
        return view('usuarios/usuarios', compact('usuarios','departamentos'));
    }

    public function agregar_view()
    {
        $departamentos = DepartamentosModel::all();
        return view('usuarios/agregar_usuarios', compact('departamentos'));
    }

    public function agregar(Request $request)
    {
        $existencia = DepartamentosModel::where('nombre', $request->nombre)->exists();

        if($existencia == true)
        {
            Alert::error('Error', 'El Registro ya existe');
            return Redirect::to('/departamentos');
        }
        else{
            UsuariosModel::create([
                'id_departamento' => $request->departamento,
                'nombre' => $request->nombre,
                'apellidoPaterno' => $request->apellidoPaterno,
                'apellidoMaterno' => $request->apellidoMaterno,
                'usuario' => $request->usuario,
                'contrasena' => Hash::make($request->contrasena),
                'estado' => 1,
            ]);

            Alert::success('Todo correcto', 'Registro agregado correctamente');
            return Redirect::to('/usuarios');
        }
    }

    public function editar_view($id)
    {
        $usuario = UsuariosModel::find($id);
        $departamentos = DepartamentosModel::where('id', '!=', $usuario->id_departamento)->get();
        return view('usuarios/editar_usuarios', compact('usuario', 'departamentos'));
    }

    public function editar(Request $request)
    {
        $id = $request->id;
        $usuario = UsuariosModel::find($id);
        $existencia = UsuariosModel::where('id', '!=', $usuario->id)->where('usuario', $request->usuario)->exists();
          
        if($existencia == true)
        {
            Alert::error('Error', 'El Registro ya existe');
            return Redirect::to('/usuarios');
        }
        else{
            if($request->contrasena == null)
            {
                $contrasena = $usuario->contrasena;
            }
            else{
                $contrasena = Hash::make($request->contrasena);
            }
    
            UsuariosModel::find($request->id)->update([
                'nombre' => $request->nombre,
                'apellidoPaterno' => $request->apellidoPaterno,
                'apellidoMaterno' => $request->apellidoMaterno,
                'usuario' => $request->nombre,
                'contrasena' => $contrasena,
            ]);
    
            Alert::success('Todo correcto', 'Registro actualizado correctamente');
            return Redirect::to('/usuarios');
        }
    }
}
