<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Cat_escuela_procedencia;
use App\Models\Extraescolares;
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
        $this->middleware(['auth', 'nocache'])->only(['index']);
        $this->middleware(['auth', 'Admin'])->only(['index', 'creditosLib', 'agregarEvidencias', 'creditosTram', 'registrarAlum', 'constanciasLib', 'evidencias']);
    }
    public function index()
    {
        $datos = Alumno::select('t_alumnos.id as id_alumno', 't_alumnos.*', 't_personas.*')->join('t_personas', 't_personas.id', 't_alumnos.fk_persona')->get();
        $titulo = 'Dashboard';
        return view("ADM/index", compact('titulo', 'datos'));
    }
    public function editAlumno($id)
    {

        $datos = Alumno::select('t_alumnos.id as id_alumno', 't_alumnos.*', 't_personas.*')->join('t_personas', 't_personas.id', 't_alumnos.fk_persona')->where('t_alumnos.id', $id)->first();
        // echo($datos);
        $items = Cat_escuela_procedencia::all();
        $titulo = 'Editar Alumno';
        return view('ADM/editalumno', compact('titulo', 'items', 'datos'));
    }
    public function creditosLib()
    {
        $titulo = 'Creditos liberados';
        return view('ADM/liberados', compact('titulo'));
    }
    public function agregarEvidencias($id)
    {
        $datos = Alumno::select('t_alumnos.id as id_alumno', 't_alumnos.*', 't_personas.*')->join('t_personas', 't_personas.id', 't_alumnos.fk_persona')->where('t_alumnos.id', $id)->first();
        $titulo = 'Agregar Evidencias';
        return view('ADM/agregar_evidencias', compact('titulo', 'datos'));
    }
    public function creditosTram()
    {
        $titulo = 'Creditos en tramite';
        return view('ADM/tramite', compact('titulo'));
    }
    public function registrarAlum()
    {
        $titulo = 'Registrar Alumos';
        $items = Cat_escuela_procedencia::all();
        return view('ADM/registrar', compact('titulo', 'items'));
    }

    public function crearCarpeta($nombreCarpeta)
    {
        if (!file_exists(public_path('Personas/' . $nombreCarpeta))) {
            mkdir(public_path('Personas/' . $nombreCarpeta), 0777, true);
        }
    }
    public function darAlta(Request $request)
    {
        $persona = new Persona();
        $alumno = new Alumno();
        $this->validate($request, [
            'nombre'=>'required|max:50|string',
            'paterno' => ['required', 'max:50', 'string'],
            'materno' => 'required|max:50|string',
            'genero' => 'required',
            'numeroCelular' => 'required|min:10',
            'fechaNac' => 'required|date',
            'numControl'=>'required|string|min:9',
            'carrera'=>'required',
            'procedencia'=>'required',
            'fechaTec'=>'required|date'
        ]);
        $persona->nombre = $request->nombre;
        $persona->paterno = $request->paterno;
        $persona->materno = $request->materno;
        $persona->genero = $request->genero;
        $persona->num_celular = $request->celular;
        $persona->fechaNac = $request->fechaNac;
        if ($persona->save()) {
            $id = $persona->id;
            $alumno->num_control = $request->numControl;
            $alumno->carrera = $request->carrera;
            $alumno->fk_persona = $id;
            // $alumno->fk_escuela_procedencia=$escuelaP;
            $alumno->fk_escuela_procedencia = $request->procedencia;
            $alumno->fecha_ingreso_tec = $request->fechaTec;
            if ($alumno->save()) {
                $this->crearCarpeta($request->numControl);
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
        return view('ADM/evidencias', compact('titulo'));
    }
    public function guardarFile($nombreGeneral, $nombreActividad, $numControl, $archivo, $nombreCredito)
    {
        $ruta = public_path('Personas/' . $numControl . '/' . $nombreActividad);
        $formato = strtolower(pathinfo($archivo->getClientOriginalName(), PATHINFO_EXTENSION));
        // $nombreGeneral.=$nombreCredito.'.'.$formato;
        $nombreCredito .= '_' . $nombreGeneral . '.' . $formato;
        $archivo->move($ruta, $nombreCredito);
    }
    public function agregarEvidencia(Request $request, $id)
    {
        $extra = new Extraescolares();
        $this->validate($request,[
            'actividad'=>'required',
            'credito'=>'required',
            'nombre_evento' => 'required|string|max:15',
            'archivo'=>'required|file:600'
        ]);
        $extra->fk_alumno = $id;
        $extra->fk_estatus = 2;
        $fecha = date('Y-m-d');
        $archivoG = $request->nombre_evento . '_' . $fecha;
        // $extra->evidencia = $request->nombre_evento;
        $extra->evidencias = $request->nombre_evento;
        $extra->fk_credito = 1;
        $extra->horas_liberadas = $request->horas;
        $extra->constancia_liberada = 1;
        $numeroControl = $request->num_control;
        // dd($archivoG);
        if ($extra->save()) {
            $this->guardarFile($archivoG, $request->actividad, $numeroControl, $request->file('archivo'), $request->credito);
            Alert::success('Se ha creado guardado el archivo', 'Registro exitoso');
            return redirect()->route('admin');
        } else {
            Alert::error('No se pudo realizar el registro!', 'Vuelva a intentarlo');
            return back();
        }
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre'=>'required|max:50|string',
            'paterno' => ['required', 'max:50', 'string'],
            'materno' => 'required|max:50|string',
            'genero' => 'required',
            'numeroCelular' => 'required|min:10|numeric',
            'fechaNac' => 'required|date',
            'numControl'=>'required|string1|min:9',
            'carrera'=>'required',
            'procedencia'=>'required',
            'fechaTec'=>'required|date'
        ]);
        $alumno = Alumno::find($id);
        echo $alumno;
        $persona = Persona::find($alumno->fk_persona);
        echo $persona;
        $alumno->num_control = $request->numControl;
        $alumno->carrera = $request->carrera;
        $alumno->fk_escuela_procedencia = $request->procedencia;
        $alumno->fecha_ingreso_tec = $request->fechaTec;
        if ($alumno->save()) {
            $persona->nombre = $request->nombre;
            $persona->paterno = $request->paterno;
            $persona->materno = $request->materno;
            $persona->num_celular = $request->celular;
            $persona->genero = $request->genero;
            if ($persona->save()) {
                Alert::success('Se ha actualizado el Alumno!', 'Registro exitoso');
                return redirect()->route('admin');
            } else {
                Alert::error('No se pudo Actualizar el registro!', 'Vuelva a intentarlo');
                return back();
            }
        } else {
            Alert::error('No se pudo Actualizar el registro!', 'Vuelva a intentarlo');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        $persona = Persona::find($alumno->fk_persona);
        // falta para eliminar los creditos de los alumnos
        if ($alumno->delete() && $persona->delete()) {
            Alert::success('Se elimino con exito', 'Se elimino al estudiante');
            return redirect()->route('admin');
        } else {
            Alert::danger('Error', 'No se pudo eliminar al estudiante');
            return back();
        }
    }
}
