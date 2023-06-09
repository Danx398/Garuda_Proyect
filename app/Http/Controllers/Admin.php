<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Cat_credito;
use App\Models\Cat_escuela_procedencia;
use App\Models\Extraescolares;
use App\Models\Persona;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

use function PHPUnit\Framework\assertIsNotInt;

class Admin extends Controller
{
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
        $items = Cat_escuela_procedencia::all();
        $titulo = 'Editar Alumno';
        $ruta = 'admin';
        return view('ADM/editalumno', compact('titulo', 'items', 'datos','ruta'));
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
            ->join('t_cat_estatus', 't_cat_estatus.id', 't_extraescolares.fk_estatus')->orderBy('t_extraescolares.fk_alumno', 'asc')->where('t_extraescolares.fk_estatus',1)->get();
        $titulo = 'Creditos en tramite';
        $ruta = 'admin';
        return view('ADM/tramite', compact('ruta','titulo', 'datos', 'datos','datosExtra'));
    }
    public function eliminarExtraescolar($id){
        $extraescolar = Extraescolares::find($id);
        if ($extraescolar->delete() && Storage::delete('public/'.$extraescolar->ruta)) {
            Alert::success('Se elimino con exito', 'Se elimino la evidencia');
            return back();
        } else {
            Alert::error('Error', 'No se pudo eliminar la evidencia');
            return back();
        }
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
        if (!file_exists(public_path('storage/'.'Personas/' . $nombreCarpeta))) {
            mkdir(public_path('storage/'.'Personas/' . $nombreCarpeta),0777,true);
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
    public function constanciasLib($id)
    {
        $alumno = Alumno::find($id);
        $extraescolar = Extraescolares::select(
            't_extraescolares.id as id_extraescolares',
            't_extraescolares.*',
            't_cat_creditos.credito',
            't_cat_estatus.estatus'
        )->join('t_cat_creditos', 't_cat_creditos.id', 't_extraescolares.fk_credito')
            ->join('t_cat_estatus', 't_cat_estatus.id', 't_extraescolares.fk_estatus')
            ->where('fk_alumno',$id)->where('t_extraescolares.fk_estatus',2)->get();
        $titulo = 'Constancias Liberadas';
        $ruta = 'tramite-admin';
        return view('ADM/constancias', compact('titulo','ruta','alumno','extraescolar'));
    }
    public function evidencias($id)
    {
        $datos = Alumno::select(
            't_alumnos.id as id_alumno',
            't_alumnos.*',
            't_personas.*',
        )->join('t_personas', 't_personas.id', 't_alumnos.fk_persona')->where('t_alumnos.id',$id)->first();
        $datosExtra = Extraescolares::select(
            't_extraescolares.id as id_extraescolares',
            't_extraescolares.*',
            'credito',
            'estatus'
        )->join('t_cat_creditos', 't_cat_creditos.id', 't_extraescolares.fk_credito')
            ->join('t_cat_estatus', 't_cat_estatus.id', 't_extraescolares.fk_estatus')->where('fk_alumno',$id)->where('t_extraescolares.fk_estatus',1)->get();
        $fecha = Carbon::now();
        $fecha = $fecha->format('d-m-Y');
        $titulo = 'Evidencias';
        $ruta = 'tramite-admin';
        return view('ADM/evidencias', compact('titulo','ruta','datosExtra','datos','fecha'));
    }
    public function guardarFile($nombreGeneral, $nombreActividad, $numControl, $archivo, $nombreCredito)
    {
        $ruta = public_path('storage/'.'Personas/' . $numControl . '/' . $nombreActividad);
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
        $credito = '';
        if($request->credito == 1){
            $credito = 'Civico';
        }else if($request->credito == 2){
            $credito = 'Deportivo';
        }else if($request->credito == 3){
            $credito = 'Cultural';
        }
        $extra->fk_alumno = $id;
        $extra->fk_estatus = 1;
        $fecha = date('Y-m-d');
        $archivoG = $request->nombre_evento . '_' . $fecha;
        $formato = strtolower(pathinfo($request->file('archivo')->getClientOriginalName(), PATHINFO_EXTENSION));
        $extra->evidencia = $request->nombre_evento;
        $extra->tipo_evidencia = $request->actividad;
        $ruta = 'Personas/' . $request->num_control . '/' . $request->actividad . '/' . $request->credito . '_' . $archivoG . '.' . $formato;
        $extra->ruta = $ruta;
        $extra->fk_credito = $request->credito;
        $extra->horas_liberadas = $request->horas;
        $extra->ruta_fisica = $credito.'-'.$request->num_control;
        $extra->constancia_liberada = 0;
        $numeroControl = $request->num_control;
        if ($extra->save()) {
            $this->guardarFile($archivoG, $request->actividad, $numeroControl, $request->file('archivo'), $request->credito);
            Alert::success('Registro exitoso','Se ha creado y guardado el archivo');
            return redirect()->route('admin');
        } else {
            Alert::error('No se pudo realizar el registro!', 'Vuelva a intentarlo');
            return back();
        }
    }
    public function liberar($id_extraescolar,$id_alumno)
    {
        $extraescolares = Extraescolares::find($id_extraescolar);
        $alumno = Alumno::find($id_alumno);
        $persona = Persona::find($alumno->fk_persona);

        $extraescolares->fk_estatus = 2;
        $extraescolares->constancia_liberada=1;
        $extraescolares->ruta_fisica = 'Constancias-'.$alumno->num_control;
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
        return $pdf->stream('Constancia-'.$alumno->num_control);
    }
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
    public function destroy($id)
    {
        $count = 0;
        $countDoc = 0;
        $alumno = Alumno::find($id);
        $persona = Persona::find($alumno->fk_persona);
        $extraescolares = Extraescolares::where('fk_alumno',$alumno->id)->get();
        
        foreach ($extraescolares as $extraescolar) {
            $countDoc += Storage::delete('public/'.$extraescolar->ruta);
            $count += $extraescolar->delete();
        }
        if($count > 0 && $countDoc > 0){
            if ($alumno->delete() && $persona->delete()) {
                Alert::success('Se elimino con exito', 'Se elimino al estudiante');
                return redirect()->route('admin');
            } else {
                Alert::error('Error', 'No se pudo eliminar al estudiante');
                return back();
            }
        }else{
            if ($alumno->delete() && $persona->delete()) {
                Alert::success('Se elimino con exito', 'Se elimino al estudiante');
                return redirect()->route('admin');
            } else {
                Alert::error('Error', 'No se pudo eliminar al estudiante');
                return back();
            }
        }
    }
}
