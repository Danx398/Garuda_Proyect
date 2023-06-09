<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class SuperAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','nocache'])->only(['index']);
        $this->middleware(['auth','sAdmin'])->only(['index', 'cambiarPass', 'crearNuevoAdmin', 'cambiar','destroy']);
    }
    public function index()
    {
        $datos = User::select('users.id as id_user','users.*','t_personas.*')
            ->join('t_personas', 't_personas.id', 'users.fk_persona')
            ->where('rol', 'admin')->get();
        $titulo = 'Dashboard Super Admin';

        $title = 'Cuidado!';
        $text = "Ya no se podra recuperar la informacion, ¿esta seguro?";
        confirmDelete($title, $text);
        return view('SADM/index', compact('titulo', 'datos'));
    }
    public function cambiar()
    {
        $datos = User::select('users.id as id_user','users.*','t_personas.*')
            ->join('t_personas', 't_personas.id', 'users.fk_persona')
            ->where('rol', 'admin')->get();
        $titulo = 'cambiar';
        return view('SADM/cambio', compact('titulo', 'datos'));
    }
    public function crearNuevoAdmin()
    {
        $titulo = 'Crear nuevo admin';
        return view('SADM/nadmin', compact('titulo'));
    }
    public function store(Request $request)
    {
        $persona = new Persona();
        $usuario = new User();
        $this->validate($request, [
            'usuario' => 'required|max:50|string',
            'password' => ['required', Password::min(8)],
            'nombre' => 'required|string|max:50',
            'paterno' => ['required', 'max:50', 'string'],
            'materno' => 'required|max:50|string',
            'fechaNacimiento' => 'required|date',
            'email' => 'required|email',
            'genero' => 'required',
            'numeroCelular' => 'required|min:10|numeric'
        ]);

        $persona->nombre = $request->nombre;
        $persona->paterno = $request->paterno;
        $persona->materno = $request->materno;
        $persona->num_celular = $request->numeroCelular;
        $persona->genero = $request->genero;
        $persona->fechaNac = $request->fechaNacimiento;
        if ($persona->save()) {
            $id = $persona->id;
            $usuario->name = $request->usuario;
            $usuario->email = $request->email;
            $usuario->fk_persona = $id;
            $usuario->rol = 'admin';
            $usuario->password = Hash::make($request->password);
            if ($usuario->save()) {
                Alert::success('Se ha creado el usuario!', 'Registro exitoso');
                return redirect()->route('inicio-sadmin');
            } else {
                Alert::error('No se pudo realizar el registro!', 'Vuelva a intentarlo');
                return back();
            }
        } else {
            Alert::error('No se pudo realizar el registro!', 'Vuelva a intentarlo');
            return back();
        }
    }
    public function cambioContrasenia(Request $request, $id){
        $this->validate($request,[
            'ContraseniaNueva' => ['required',Password::min(8)],
            'ContraseniaConfirmar' => ['required',Password::min(8),'same:ContraseniaNueva'],
        ]);
        $user = User::find($id);
        $user ->password = Hash::make($request->ContraseniaConfirmar);
        if($user -> save()){
            Alert::success('Cambio exitoso!!!', 'Se cambio la contraseña');
            return redirect()->route('cambio-sadmin');
        }else{
            Alert::error('Error!!','No se ha cambiado la contraseña');
            return back();
        }
    }
    public function cambiarPass($id)
    {
        $datos = User::select('users.id as id_user','users.*','t_personas.*')
            ->join('t_personas', 't_personas.id', 'users.fk_persona')
            ->where('rol', 'admin')->where('users.id', $id)->first();
        $titulo = 'Cambiar contraseña';
        $edad = Carbon::createFromDate($datos->fechaNac)->age;

        return view('SADM/cpass', compact('titulo', 'datos', 'edad'));
    }

    public function editAdmin($id)
    {
        $datos = User::select('users.id as id_user','users.*','t_personas.*')
            ->join('t_personas', 't_personas.id', 'users.fk_persona')
            ->where('rol', 'admin')->where('users.id', $id)->first();
        $titulo = 'Editar admin';
        return view('SADM/eadmin', compact('titulo', 'datos'));
    }
    public function updateAdmin(Request $request, $id)
    {
        $usuario = User::find($id);
        $persona = Persona::find($usuario->fk_persona);

        $this->validate($request, [
            'nombre' => 'required|string|max:50',
            'paterno' => ['required', 'max:50', 'string'],
            'materno' => 'required|max:50|string',
            'fechaNacimiento' => 'required|date',
            'email' => 'required|email',
            'genero' => 'required',
            'numeroCelular' => 'required|min:10|numeric'
        ]);

        $usuario->email = $request->email;
        if ($usuario->save()) {
            $persona->nombre = $request->nombre;
            $persona->paterno = $request->paterno;
            $persona->materno = $request->materno;
            $persona->num_celular = $request->numeroCelular;
            $persona->genero = $request->genero;
            $persona->fechaNac = $request->fechaNacimiento;
            if ($persona->save()) {
                Alert::success('Se ha actualizado el usuario!', 'Edicion exitosa');
                return redirect()->route('inicio-sadmin');
            } else {
                Alert::error('No se pudo realizar la edicion!', 'Intentelo de nuevo');
                return back();
            }
        } else {
            Alert::error('No se pudo realizar la edicion!', 'Intentelo de nuevo');
            return back();
        }
    }
    public function destroy($id)
    {
        $usuario = User::find($id);
        $persona = Persona::find($usuario->fk_persona);

        if ($usuario->delete() && $persona->delete()) {
            Alert::success('Se elimino con exito', 'Se ha eliminado el usuario');
            return redirect()->route('inicio-sadmin');
        } else {
            Alert::danger('Error', 'No se pudo eliminar el usuario');
            return back();
        }
    }
}
