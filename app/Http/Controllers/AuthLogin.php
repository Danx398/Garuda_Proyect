<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AuthLogin extends Controller
{
     /* public function __construct()
    {
        $this->middleware(['nocache'])->only(['index']);
    }  */
    public function index()
    {
        $titulo = 'Login';
        return view('inicio', compact('titulo'));
    }
    public function logout()
    {
        Auth::logout();
        // Session::flush();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
        Alert::success('Ah cerrado su sesion!','Hasta luego');
        // ->with('success','Ah cerrado su sesion!','Hasta luego');
    }
    /*public function logear(Request $request) {
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
                return redirect()->route('admin');
                // ->withSuccess('Ah iniciado sesion!','Bienvenido');
            } else {
                return $this->logout();
            }
        } else {
            Alert::error('No existe este usuario');
            return back()->withInput($credenciales);
            // ->with('errors','No existe este usuario');
        }
    }*/
    public function logear(Request $request){
        $user = User::where('name',$request->name)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                Auth::login($user);
                request()->session()->regenerate();
                return redirect()->route($user->rol == 'Sadmin' ? 'inicio-sadmin':'admin');
            }
        }
    }

}
