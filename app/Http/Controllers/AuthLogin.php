<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthLogin extends Controller
{
    public function index()
    {
        $titulo = 'Login';
        return view('inicio', compact('titulo'));
    }
}
