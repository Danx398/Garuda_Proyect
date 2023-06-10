<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Cat_credito;
use App\Models\Cat_escuela_procedencia;
use App\Models\Extraescolares;
use App\Models\Persona;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

use function PHPUnit\Framework\assertIsNotInt;

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
        $ruta = 'admin';
        return view('ADM/editalumno', compact('titulo', 'items', 'datos','ruta'));
    }
    public function creditosLib()
    {
        $titulo = 'Creditos liberados';
        $ruta = 'admin';
        return view('ADM/liberados', compact('titulo','ruta'));
    }
    public function agregarEvidencias($id)
    {

        $items = Cat_credito::all();
        //civicas
        $horasCivicas = Extraescolares::where('fk_alumno', $id)->where('fk_credito', 1)->sum('horas_liberadas');
        //deportivas
        $horasDeportivas = Extraescolares::where('fk_alumno', $id)->where('fk_credito', 2)->sum('horas_liberadas');
        //culturales
        $horasCulturales = Extraescolares::where('fk_alumno', $id)->where('fk_credito', 3)->sum('horas_liberadas');
        $datos = Alumno::select('t_alumnos.id as id_alumno', 't_alumnos.*', 't_personas.*')->join('t_personas', 't_personas.id', 't_alumnos.fk_persona')->where('t_alumnos.id', $id)->first();
        $titulo = 'Agregar Evidencias';
        $ruta = 'admin';
        return view('ADM/agregar_evidencias', compact('ruta','titulo', 'datos','items','horasCivicas','horasDeportivas','horasCulturales'));
    }
    public function creditosTram()
    {
        $datos = Alumno::select(
            't_alumnos.id as id_alumno',
            't_alumnos.*',
            't_personas.*',
        )->join('t_personas', 't_personas.id', 't_alumnos.fk_persona')->get();
        $datosExtra = Extraescolares::select(
            't_extraescolares.id as id_extraescolares',
            't_extraescolares.*',
            't_cat_creditos.*',
            't_cat_estatus.*'
        )->join('t_cat_creditos', 't_cat_creditos.id', 't_extraescolares.fk_credito')
            ->join('t_cat_estatus', 't_cat_estatus.id', 't_extraescolares.fk_estatus')->orderBy('t_extraescolares.fk_alumno', 'asc')->where('t_extraescolares.fk_estatus',2)->get();

        $titulo = 'Creditos en tramite';
        $ruta = 'admin';
        return view('ADM/tramite', compact('ruta','titulo', 'datos', 'datos','datosExtra'));
    }
    public function registrarAlum()
    {
        $titulo = 'Registrar Alumos';
        $items = Cat_escuela_procedencia::all();
        $ruta = 'admin';
        return view('ADM/registrar', compact('titulo', 'items','ruta'));
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
            'nombre' => 'required|max:50|string',
            'paterno' => ['required', 'max:50', 'string'],
            'materno' => 'required|max:50|string',
            'genero' => 'required',
            'numeroCelular' => 'required|min:10',
            'fechaNac' => 'required|date',
            'numControl' => 'required|string|min:9',
            'carrera' => 'required',
            'procedencia' => 'required',
            'fechaTec' => 'required|date'
        ]);
        $persona->nombre = $request->nombre;
        $persona->paterno = $request->paterno;
        $persona->materno = $request->materno;
        $persona->genero = $request->genero;
        $persona->num_celular = $request->numeroCelular;
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
    public function evidencias($id)
    {
        $datosExtra = Extraescolares::select(
            't_extraescolares.id as id_extraescolares',
            't_extraescolares.*',
            't_cat_creditos.*',
            't_cat_estatus.*'
        )->join('t_cat_creditos', 't_cat_creditos.id', 't_extraescolares.fk_credito')
            ->join('t_cat_estatus', 't_cat_estatus.id', 't_extraescolares.fk_estatus')->orderBy('t_extraescolares.fk_alumno', 'asc')->get();
        $titulo = 'Evidencias';
        $ruta = 'tramite-admin';
        return view('ADM/evidencias', compact('titulo','ruta','datosExtra'));
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
        $this->validate($request, [
            'actividad' => 'required',
            'credito' => 'required',
            'nombre_evento' => 'required|string',
            'archivo' => 'required|file:600',
            'horas' => 'required'
        ]);
    // dd('credito: ' . $request->credito, 'civicas' . $request->horasCivicas, 'deportivas' . $request->horasDeportivas, 'culturales' . $request->horasCulturales, 'horas' . $request->horas);
        if ($request->credito == 1) {
            if ($request->horas >= $request->horasCivicas && $request->horas != $request->horasCivicas) {
                echo ('civicas');
                Alert::error('El numero de horas Civicas es mayor al maximo de horas', 'Vuelva a intentarlo');
                return back()->withInput();
            }
        } else if ($request->credito == 2) {
            if ($request->horas >= $request->horasDeportivas && $request->horas != $request->horasDeportivas) {
                echo ('deportivas');
                Alert::error('El numero de horas Deportivas es mayor al maximo de horas', 'Vuelva a intentarlo');
                return back()->withInput();
            }
        } else if ($request->credito == 3) {
            if ($request->horas >= $request->horasCulturales && $request->horas != $request->horasCulturales) {
                echo ('culturales');
                Alert::error('El numero de horas Culturales es mayor al maximo de horas', 'Vuelva a intentarlo');
                return back()->withInput();
            }
        }
        // if (!$request->horas < $request->horasCivicas) {
        //     echo ('civicas');
        //     Alert::error('El numero de horas Civicas es mayor al maximo de horas', 'Vuelva a intentarlo');
        //     return back();
        // } else if (!$request->horas < $request->horasDeportivas) {
        //     echo ('deporivas');
        //     Alert::error('El numero de horas Deportivas es mayor al maximo de horas', 'Vuelva a intentarlo');
        //     return back();
        // } else if (!$request->horas < $request->horasCulturales) {
        //     echo ('culturales');
        //     Alert::error('El numero de horas Culturales es mayor al maximo de horas', 'Vuelva a intentarlo');
        //     return back();
        // }
        $extra->fk_alumno = $id;
        $extra->fk_estatus = 2;
        $fecha = date('Y-m-d');
        $archivoG = $request->nombre_evento . '_' . $fecha;
        $formato = strtolower(pathinfo($request->file('archivo')->getClientOriginalName(), PATHINFO_EXTENSION));
        // $extra->evidencia = $request->nombre_evento;
        $extra->evidencia = $request->nombre_evento;
        $extra->tipo_evidencia = $request->actividad;
        $ruta = 'Personas/' . $request->num_control . '/' . $request->actividad . '/' . $request->credito . '_' . $archivoG . '.' . $formato;
        $extra->ruta = $ruta;
        $extra->fk_credito = $request->credito;
        $extra->horas_liberadas = $request->horas;
        $extra->ruta_fisica = 'Cajon derecho';
        $extra->constancia_liberada = 0;
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

    // public function generarPdf($numeroControl, $nombre, $paterno, $materno, $actividad, $carrera, $horas)
    // {
    //     /* $profesor = 'Aquino Segura Roldan';
    //     $rol = 'JEFE DEL DEPARTAMENTO DE ACTIVIDADES';
    //     $ambito = 'EXTRAESCOLARES'; */
    //     // dd($numeroControl,$nombre,$paterno,$materno,$actividad,$carrera,$horas);
    //     $data = [
    //         'num_control'=>$numeroControl,
    //         'anio_actual'=> date('Y'),
    //         'nombre' =>$nombre,
    //         'actividad' =>$actividad,
    //         'fecha' => date('Y-m-d'),
    //         'carrera' => $carrera,
    //         'horas' => $horas,
    //         'profesor' => ' ing. Aquino Segura Roldan',
    //         'rol' => 'JEFE DEL DEPARTAMENTO DE ACTIVIDADES',
    //         'ambito' => 'EXTRAESCOLARES',
    //         'firma' => '________________________________'
    //     ];
    //     $pdf = PDF::loadView('pdf', $data);
    //     // compact('profesor', 'rol', 'ambito')

    //     return $pdf->stream('ejemplo.pdf');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function liberar($id_extraescolar,$id_alumno)
    {
        $extraescolares = Extraescolares::find($id_extraescolar);
        $alumno = Alumno::find($id_alumno);
        $persona = Persona::find($alumno->fk_persona);

        // echo $extraescolares;
        // echo $alumno;
        // echo $persona;

        // $this->generarPdf($alumno->num_control, $persona->nombre, $persona->paterno, $persona->materno, $extraescolares->evidencia, $alumno->carrera, $extraescolares->horas_liberadas);
        $extraescolares->constancia_liberada = 1;
        $extraescolares->save();
        $data = [
            'num_control'=>$alumno->num_control,
            'anio_actual'=> date('Y'),
            'nombre' =>$persona->nombre.' '.$persona->paterno.' '.$persona->materno,
            'actividad' =>$extraescolares->evidencia,
            'credito' =>$extraescolares->fk_credito == 1 ? 'Civico' :($extraescolares->fk_credito == 2 ? 'Deportivo': 'Cultural'),
            'fecha' => date('Y-m-d'),
            'carrera' => $alumno->carrera,
            'horas' => $extraescolares->horas_liberadas,
            'profesor' => ' ing. Aquino Segura Roldan',
            'rol' => 'JEFE DEL DEPARTAMENTO DE ACTIVIDADES',
            'ambito' => 'EXTRAESCOLARES',
            'firma' => '________________________________'
        ];
        $pdf = PDF::loadView('pdf', $data);
        // compact('profesor', 'rol', 'ambito')

        return $pdf->download('ejemplo.pdf');
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
            'nombre' => 'required|max:50|string',
            'paterno' => ['required', 'max:50', 'string'],
            'materno' => 'required|max:50|string',
            'genero' => 'required',
            'numeroCelular' => 'required|min:10|string',
            'fechaNac' => 'required|date',
            'numControl' => 'required|string|min:9',
            'carrera' => 'required',
            'procedencia' => 'required',
            'fechaTec' => 'required|date'
        ]);
        $alumno = Alumno::find($id);
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
            $persona->num_celular = $request->numeroCelular;
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
        $count = 0;
        $alumno = Alumno::find($id);
        $persona = Persona::find($alumno->fk_persona);
        $extraescolares = Extraescolares::where('fk_alumno',$alumno->id)->get();
        
        foreach ($extraescolares as $extraescolar) {
            $count += $extraescolar->delete();
        }
        if($count > 0){
            if ($alumno->delete() && $persona->delete()) {
                Alert::success('Se elimino con exito', 'Se elimino al estudiante');
                return redirect()->route('admin');
            } else {
                Alert::danger('Error', 'No se pudo eliminar al estudiante');
                return back();
            }
        }else{
            Alert::danger('Error', 'No se pudo eliminar al estudiante');
            return back();
        }
    }
}
