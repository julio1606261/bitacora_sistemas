<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PapeleriaModel;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class PapeleriaController extends Controller
{
    public function index()
    {
        $papeleria = PapeleriaModel::all();
        return view('papeleria/papeleria', compact('papeleria'));
    }

    public function agregar(Request $request)
    {
        PapeleriaModel::create([
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'solicitante' => $request->solicitante,
            'fecha' => $request->fecha,
            'observaciones' => $request->observaciones,
            'estado' => $request->estado,
        ]);

        Alert::success('Todo correcto', 'Registro agregado correctamente');
        return Redirect::to('/papeleria'); 
    }

    public function editar_view($id)
    {
        $papeleria = PapeleriaModel::find($id);
        return view('papeleria/editar_papeleria', compact('papeleria'));
    }

    public function editar(Request $request)
    {
        $id = $request->id;
        PapeleriaModel::find($id)->update([
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'solicitante' => $request->solicitante,
            'fecha' => $request->fecha,
            'observaciones' => $request->observaciones,
            'estado' => $request->estado,
        ]);

        Alert::success('Todo correcto', 'Registro actualizado correctamente');
        return Redirect::to('/papeleria');
    } 
}
