<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = 'Dashboard';
        return view("ADM/dash", compact('titulo'));
    }
    public function creditosLib()
    {
        $titulo = 'Creditos liberados';
        return view('ADM/liberados', compact('titulo'));
    }
    public function agregarEvidencias()
    {
        $titulo = 'Agregar Evidencias';
        return view('ADM/agregar_evidencias', compact('titulo'));
    }
    public function creditosTram()
    {
        $titulo = 'Creditos en tramite';
        return view('ADM/tramite', compact('titulo'));
    }
    public function registrarAlum()
    {
        $titulo = 'Registrar Alumos';
        return view('ADM/registrar', compact('titulo'));
    }
    public function constanciasLib()
    {
        $titulo = 'Constancias Liberadas';
        return view('ADM/constancias', compact('titulo'));
    }
    public function evidencias()
    {
        $titulo = 'Evidencias';
        return view('ADM/evidencias',compact('titulo'));
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
