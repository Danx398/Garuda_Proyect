<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;

class SuperAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth'])->only(['index', 'cambiarPass', 'crearNuevoAdmin', 'cambiar']);
    }
    public function index()
    {
        $datos = User::select()
                ->join('t_personas', 't_personas.id_persona', 'users.fk_persona')
                ->where('rol','admin')->get();
        $titulo = 'Dashboard Super Admin';
        return view('SADM/dash', compact('titulo', 'datos'));
    }
    public function cambiar()
    {
        $datos = User::select()
                ->join('t_personas', 't_personas.id_persona', 'users.fk_persona')
                ->where('rol','admin')->get();
        $titulo = 'cambiar';
        return view('SADM/cambio', compact('titulo','datos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearNuevoAdmin()
    {
        $titulo = 'Crear nuevo admin';
        return view('SADM/nadmin', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->request);
        $persona = new Persona();
        $usuario = new User();
        $this->validate($request,[
            'usuario'=> 'required|max:50|string',
            'password' => ['required',Password::min(8)],
            // ->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            'nombre' => 'required|string|max:50',
            'paterno' => ['required','max:50','string'],
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
        if($persona->save()){
            $id = $persona->id;
            $usuario->name = $request->usuario;
            $usuario->email = $request->email;
            $usuario->fk_persona = $id;
            $usuario->rol = 'admin';
            $usuario->password = Hash::make($request->password);
            if($usuario->save()){
                Alert::success('Se ha creado el usuario!','Registro exitoso');
                return redirect()->route('inicio-sadmin');
            }
        }else{
            return back()->with('errors','No se pudo realizar el registro');
        }
        
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
    public function cambiarPass($id)
    {
        $datos = User::select()
                ->join('t_personas', 't_personas.id_persona', 'users.fk_persona')
                ->where('rol','admin')->where('id',$id)->get();
        $titulo = 'Cambiar contraseña';
        return view('SADM/cpass', compact('titulo','datos'));
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
