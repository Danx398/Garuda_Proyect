@extends('layouts/main')
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <h1 class="text-center mt-3">Actualizar Alumno</h1>
        <div class="row justify-content-center text-center mt-4">
            <div class="col-10">
                <form action="{{ route('update-admin', $datos->id_alumno) }}" class="form-control bg-primary text-light" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row justify-content-center text-center mt-5">
                        <div class="col-5">
                            <label for="" class="">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="{{$datos->nombre}}">
                            <label for="" class="mt-2">Apellido paterno</label>
                            <input type="text" class="form-control" name="paterno" id="paterno" value="{{$datos->paterno}}">
                            <label for="" class="mt-2">Apellido materno</label>
                            <input type="text" class="form-control" name="materno" id="materno" value="{{$datos->materno}}">
                            <label for="" class="mt-2">Genero</label>
                            <select name="genero" id="genero" class="form-control">
                                <option value="masculino" @if ($datos->genero == 'masculino') selected @endif >Masculino</option>
                                <option value="femenino" @if ($datos->genero == 'femenino') selected @endif>Femenino</option>
                            </select>
                            <label for="" class="mt-2">Numero de control</label>
                            <input type="text" class="form-control" name="numControl" id="numControl" value="{{$datos->num_control}}">
                        </div>
                        <div class="col-1"></div> 
                        <div class="col-5">
                            <label for="" class="">Numero celular</label>
                            <input type="text" class="form-control" name="celular" id="celular" value="{{$datos->num_celular}}">
                            <label for="" class="mt-2">Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="fechaNac" id="fechaNac" value="{{$datos->fechaNac}}">
                            <label for="" class="mt-2">Carrera</label>
                            <input type="text" class="form-control" name="carrera" id="carrera" value="{{$datos->carrera}}">
                            <label for="" class="mt-2">Escuela de procedencia</label>
                            <select class="form-control" name="procedencia" id="procedencia">
                                @foreach ($items as $item)
                                <option value="{{$item->id}}" @if ($datos->fk_escuela_procedencia == $item->id) selected @endif>{{$item->escuela}}</option>
                                @endforeach
                            </select>
                            <label for="" class="mt-2">Fecha de ingreso al tec</label>
                            <input type="date" class="form-control" name="fechaTec" id="fechaTec" value="{{$datos->fecha_ingreso_tec}}">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-3 mb-3">
                                <button class="btn btn-light container-fluid pt-2 pb-2 rounded-4 mt-5">Registrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('shared/flotanteAdmin')
    @include('shared/footer')
@endsection
