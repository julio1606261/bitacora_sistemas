<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\DepartamentosModel;
use App\Models\UsuariosModel;
use App\Models\BitacoraModel;
use App\Models\SolpedModel;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;


class SolpedController extends Controller
{
    public function index()
    {
        $usuarios = UsuariosModel::where('id_departamento', '=', 1)->get();
        $departamentos = DepartamentosModel::all();
        $solpeds = SolpedModel::all();
        return view('solped/solpeds', compact('departamentos', 'usuarios','solpeds'));
    }

    public function filtro(Request $request)
    {
        switch ($request->filtro) {
            case 'filtro_T':
                # code...
                break;
            case 'filtro_S':
                $solpeds = SolpedModel::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->get();
               /*  return view('solped/solpeds', compact('solpeds')); */
                break;
            case 'filtro_M':
                $solpeds = SolpedModel::whereMonth('created_at', Carbon::now()->month)->get();
               /*  return view('solped/solpeds', compact('solpeds')); */
                break;
            case 'filtro_U':
                $solpeds = SolpedModel::whereBetween('created_at', [Carbon::now()->subMonths(3), Carbon::now()])->get();
                /* return view('solped/solpeds', compact('solpeds')); */
                break;
            default:
                # code...
                break;

            return response()->json($solpeds);
        }
    }

    public function agregar(Request $request)
    {
        $user = Auth::user();

        SolpedModel::create([
            'id_usuario' => $user->id,
            'solicitante' => $request->solicitante,
            'descripcion' => $request->descripcion,
            'solped' => $request->solped,
            'pedido' => $request->pedido,
            'entrada' => $request->entrada,
            'um' => $request->um,
            'cantidad' => $request->cantidad,
            'total' => $request->total,
            'observaciones' => $request->observaciones,
            'fecha_entrega' => $request->fecha_entrega,
            'estado' => $request->estado,
        ]);

        Alert::success('Todo correcto', 'Registro agregado correctamente');
        return Redirect::to('/solpeds'); 
    }

    public function editar_view($id)
    {
        $solped = SolpedModel::find($id);
        return view('solped/editar_solped', compact('solped'));
    }

    public function editar(Request $request)
    {
        $id = $request->id;
        SolpedModel::find($id)->update([
            'descripcion' => $request->descripcion,
            'solicitante' => $request->solicitante,
            'estado' => $request->estado,
            'solped' => $request->solped,
            'pedido' => $request->pedido,
            'fecha_entrega' => $request->fecha_entrega,
            'entrada' => $request->entrada,
            'observaciones' => $request->observaciones,
            'um' => $request->um,
            'cantidad' => $request->cantidad,
            'total' => $request->total,
        ]);

        Alert::success('Todo correcto', 'Registro actualizado correctamente');
        return Redirect::to('/solpeds');
    }
}
