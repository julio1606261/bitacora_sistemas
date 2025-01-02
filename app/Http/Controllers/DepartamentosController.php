<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartamentosModel;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class DepartamentosController extends Controller
{
    public function index()
    {
        $departamentos = DepartamentosModel::all();
        return view('departamentos/departamentos', compact('departamentos'));
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
            DepartamentosModel::create([
                'nombre' => $request->nombre,
                'estado' => 1,
            ]);
            Alert::success('Todo correcto', 'Registro agregado correctamente');
            return Redirect::to('/departamentos');
        }
     
    }

    public function editar_view($id)
    {
        $departamento = DepartamentosModel::find($id);
        return view('departamentos/editar_departamentos', compact('departamento'));
    }

    public function editar(Request $request)
    {
        $existencia = DepartamentosModel::where('id', '!=', $request->id)->exists();

        if($existencia == true)
        {
            Alert::error('Error', 'El Registro ya existe');
            return Redirect::to('/departamentos');
        }
        else{
            DepartamentosModel::find($request->id)->update([
                'nombre' => $request->nombre
            ]);
    
            Alert::success('Todo correcto', 'Registro actualizado correctamente');
            return Redirect::to('/departamentos');
        }
    }
}
