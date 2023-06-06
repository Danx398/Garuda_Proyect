<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Persona;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Admin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','nocache'])->only(['index']);
        $this->middleware(['auth','Admin'])->only(['index','creditosLib','agregarEvidencias','creditosTram','registrarAlum','constanciasLib','evidencias']);
    }
    public function index()
    {
        $titulo = 'Dashboard';
        return view("ADM/index", compact('titulo'));
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
    
    public function crearCarpeta($nombreCarpeta){
        if(!file_exists(public_path('Personas/'.$nombreCarpeta))){
            mkdir(public_path('Personas/'.$nombreCarpeta),0777,true);
        }
    }
    public function darAlta(Request $request){
        $persona = new Persona();
        $alumno = new Alumno();
        $persona->nombre = $request->nombre;
        $persona->paterno = $request->paterno;
        $persona->materno = $request->materno;
        $persona->genero = $request->genero;
        $persona->num_celular = $request->celular;
        $persona->fechaNac = $request->fechaNac;
        if($persona->save()){
            $escuelaP = 1;
            $id = $persona->id;
            $alumno->num_control = $request->numControl;
            $alumno->carrera = $request->carrera;
            $alumno->fk_persona = $id;
            $alumno->fk_escuela_procedencia=$escuelaP;
            $alumno->fecha_ingreso_tec = $request->fechaTec;
            if ($alumno->save()) {
                $this-> crearCarpeta($request->numControl);
                Alert::success('Se ha creado el Alumno!', 'Registro exitoso');
                return redirect()->route('admin');
            } else {
                Alert::error('No se pudo realizar el registro!', 'Vuelva a intentarlo');
                return back();
            }
        } else {
            Alert::error('No se pudo realizar el registro!', 'Vuelva a intentarlo');
            return back();
        }
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
