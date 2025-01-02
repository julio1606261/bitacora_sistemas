<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartamentosModel;
use App\Models\UsuariosModel;
use App\Models\BitacoraModel;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class BitacoraController extends Controller
{
    public function index()
    {
        $usuarios = UsuariosModel::where('id_departamento', '=', 1)->get();
        $departamentos = DepartamentosModel::all();
        $bitacoras = BitacoraModel::all();
        return view('bitacora/bitacora', compact('departamentos', 'usuarios','bitacoras'));
    }

    public function agregar(Request $request)
    {
        BitacoraModel::create([
            'id_usuario_atiende' => $request->atendido,
            'id_area_atendida' => $request->departamento,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'estado' => $request->estado,
            'amenza' => $request->amenaza,
            'descripcion_evento' => $request->descripcion_evento,
            'descripcion_solucion' => $request->descripcion_solucion,
        ]);

        Alert::success('Todo correcto', 'Registro agregado correctamente');
        return Redirect::to('/bitacora');
    }

    public function editar_view($id)
    {
        $bitac = BitacoraModel::find($id);
        $usuarios = UsuariosModel::where('id_departamento', '=', 1)->get();
        $departamentos = DepartamentosModel::all();
        $bitacoras = BitacoraModel::all();

        $departamentos_excluido = DepartamentosModel::where('id', '!=', $bitac->id_area_atendida)->get();
        $usuarios_excluido = UsuariosModel::where('id', '!=', $bitac->id_usuario_atiende)->get();
        return view('bitacora/bitacora', compact('departamentos', 'usuarios','bitacoras','bitac', 'departamentos_excluido', 'usuarios_excluido'));
    }

    public function editar(Request $request)
    {
        $id = $request->id;
        
        BitacoraModel::find($request->id)->update([
            'id_usuario_atiende' => $request->atendido,
            'id_area_atendida' => $request->departamento,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'estado' => $request->estado,
            'amenza' => $request->amenaza,
            'descripcion_evento' => $request->descripcion_evento,
            'descripcion_solucion' => $request->descripcion_solucion,
        ]);

        Alert::success('Todo correcto', 'Registro actualizado correctamente');
        return Redirect::to('/bitacora');
    }

    public function detalles_view($id)
    {
        $bitacora_detalles = BitacoraModel::find($id);
        $usuarios = UsuariosModel::where('id_departamento', '=', 1)->get();
        $departamentos = DepartamentosModel::all();
        $bitacoras = BitacoraModel::all();

        return view('bitacora/bitacora', compact('departamentos', 'usuarios','bitacoras','bitacora_detalles'));
    }
}
