<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;

class AuthLogin extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest','nocache'])->only(['index']);
    }
    public function index()
    {
        $titulo = 'Login';
        return view('inicio', compact('titulo'));
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        Alert::success('Ah cerrado su sesion!','Hasta luego');
        return redirect()->route('login');
    }
    public function logear(Request $request) {
        $credenciales = $request->only("name", "password");

        $this->validate($request,[
            'name'=> 'required|max:50|string',
            'password' => ['required',Password::min(8)]
        ]);

        if (Auth::attempt($credenciales)) {
            if ( auth()->user()->rol == 'Sadmin') {
                Alert::success('Ah iniciado sesion!','Bienvenido');
                return redirect()->route('inicio-sadmin');
            } else if(auth()->user()->rol == 'admin') {
                Alert::success('Ah iniciado sesion!','Bienvenido');
                return redirect()->route('admin');
            } else {
                return $this->logout();
            }
        } else {
            Alert::error('No existe este usuario');
            return back()->withInput($credenciales);
        }
    }

}
