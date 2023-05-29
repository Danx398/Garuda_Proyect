<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthLogin extends Controller
{
    public function index()
    {
        $titulo = 'Login';
        return view('inicio', compact('titulo'));
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
        
    }
    public function logear(Request $request) {
        $credenciales = $request->only("name", "password");
        if (Auth::attempt($credenciales)) {
            if ( auth()->user()->rol == 'Sadmin') {
                return redirect()->route('inicio-sadmin');
            } else if(auth()->user()->rol == 'admin') {
                return redirect()->route('admin');
            } else {
                return $this->logout();
            }
        } else {
            return back()->withInput($credenciales);
        }
    }

}
