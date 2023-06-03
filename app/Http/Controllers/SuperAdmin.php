<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth'])->only(['index','cambiarPass','crearNuevoAdmin','cambiar']);
    }
    public function index()
    {
        $titulo = 'Dashboard Super Admin';
        return view('SADM/dash', compact('titulo'));
    }
    public function cambiarPass()
    {
        $titulo = 'Cambiar contraseña';
        return view('SADM/cpass', compact('titulo'));
    }
    public function crearNuevoAdmin()
    {
        $titulo = 'Crear nuevo admin';
        return view('SADM/nadmin', compact('titulo'));
    }
    public function cambiar()
    {
        $titulo = 'cambiar';
        return view('SADM/cambio',compact('titulo'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
