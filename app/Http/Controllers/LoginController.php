<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuariosModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Auth\User as Authenticatable;  
use Illuminate\Support\Facades\DB;



class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user = UsuariosModel::where('usuario',$request->usuario)->first();
        $contrasena = $request->contrasena;

        if($user===null)
        {  
            Alert::error('Error','Usuario no encontrado');
            return redirect()->route('login');
        }
        if(Hash::check($contrasena, $user->contrasena))
        {   
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('home')->with('usuario',$user);
        }
        else{
            Alert::error('Error','Contraseña incorrecta');
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
