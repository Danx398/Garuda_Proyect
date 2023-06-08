@extends('layouts/main')
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <h1 class="text-center mt-3">Registrar Alumno</h1>
        <div class="row justify-content-center text-center mt-4">
            <div class="col-10">
                <form action="{{route('darAlta')}}" class="form-control bg-primary text-light" method="POST">
                    @method('POST')
                    @csrf
                    <div class="row justify-content-center text-center mt-5">
                        <div class="col-5">
                            <label for="" class="">Nombre</label>
                            <input type="text" class="form-control @error('nombre')
                                is-invalid                                
                            @enderror" name="nombre" id="nombre" value="{{old('nombre')}}">
                            @error('nombre')
                                @php
                                    Alert::error($message);
                                @endphp
                            @enderror
                            <label for="" class="mt-2">Apellido paterno</label>
                            <input type="text" class="form-control @error('paterno')
                                is-invalid
                            @enderror" name="paterno" id="paterno" value="{{old('paterno')}}">
                            @error('paterno')
                                @php
                                    Alert::error($message);
                                @endphp
                            @enderror
                            <label for="" class="mt-2">Apellido materno</label>
                            <input type="text" class="form-control @error('materno')
                                is-invalid
                            @enderror" name="materno" id="materno" value="{{old('materno')}}">
                            @error('materno')
                                @php
                                    Alert::error($message);
                                @endphp
                            @enderror
                            <label for="" class="mt-2">Genero</label>
                            <select name="genero" id="genero" class="form-control @error('genero')
                                is-invalid
                            @enderror">
                                <option value="" selected>Seleccionar</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                            </select>
                            @error('genero')
                            @php
                            Alert::error($message);
                        @endphp
                            @enderror
                            <label for="" class="mt-2">Numero de control</label>
                            <input type="text" class="form-control @error('numControl')
                                is-invalid
                            @enderror" name="numControl" id="numControl" value="{{old('numControl')}}">
                            @error('numControl')
                            @php
                            Alert::error($message);
                        @endphp
                            @enderror
                        </div>
                        <div class="col-1"></div> 
                        <div class="col-5">
                            <label for="" class="">Numero celular</label>
                            <input type="text" class="form-control @error('numeroCelular')
                                is-invalid
                            @enderror" name="numeroCelular" id="numeroCelular" value="{{old('numeroCelular')}}">
                            @error('numeroCelular')
                            @php
                                    Alert::error($message);
                                @endphp
                            @enderror
                            <label for="" class="mt-2">Fecha de nacimiento</label>
                            <input type="date" class="form-control @error('fechaNac')
                                is-invalid
                            @enderror" name="fechaNac" id="fechaNac" value="{{old('fechaNac')}}">
                            @error('fechaNac')
                            @php
                            Alert::error($message);
                        @endphp
                            @enderror
                            <label for="" class="mt-2">Carrera</label>
                            {{-- <input type="text" class="form-control" name="carrera" id="carrera"> --}}
                            <select name="carrera" id="carrera" class="form-control @error('carrera')
                                is-invalid
                            @enderror">
                                <option value="" selected>Selecciona una carrera</option>
                                <option value="Sistemas">Ingenieria en Sistemas</option>
                                <option value="Industrial">Ingenieria Industrial</option>
                                <option value="Empresarial">Ingenieria en Gestión</option>
                            </select>
                            @error('carrera')
                            @php
                            Alert::error($message);
                        @endphp
                            @enderror
                            <label for="" class="mt-2">Escuela de procedencia</label>
                            <select class="form-control @error('procedencia')
                                is-invalid
                            @enderror" name="procedencia" id="procedencia">
                                <option value="">Seleccionar</option>
                                @foreach ($items as $item)
                                <option value="{{$item->id}}">{{$item->escuela}}</option>
                                @endforeach
                            </select>
                            @error('procedencia')
                            @php
                            Alert::error($message);
                            @endphp
                            @enderror
                            <label for="" class="mt-2">Fecha de ingreso al tec</label>
                            <input type="date" class="form-control @error('fechaTec')
                                is-invalid
                            @enderror" name="fechaTec" id="fechaTec" value="{{old('fechaTec')}}">
                            @error('fechaTec')
                            @php
                            Alert::error($message);
                        @endphp
                            @enderror
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
