@extends('layouts/main')
@section('contenido')
    @include('shared/navSuper')
    <div class="container">
        <h1 class="text-center mt-3">Registrar Administrador</h1>
        <div class="row justify-content-center text-center mt-4">
            <div class="col-10">
                <form action="{{ route('guardar-sadmin') }}" class="form-control bg-primary text-light" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row justify-content-center text-center mt-5">
                        <div class="col-5">
                            <label for="" class="mb-2">Usuario</label>
                            <input type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario"
                                id="usuario" value="{{ old('usuario') }}">
                            @error('usuario')
                                @php
                                    Alert::error($message);
                                @endphp
                                {{-- <div class="alert alert-warning small">{{$message}}</div> --}}
                            @enderror
                            <label for="" class="mt-2 mb-2">Contraseña</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password" value="{{ old('password') }}">
                            @error('password')
                                @php
                                    Alert::error($message);
                                @endphp
                            @enderror
                            <label for="" class="mt-2 mb-2">Nombre</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                id="nombre" value="{{ old('nombre') }}">
                            @error('nombre')
                                @php
                                    Alert::error($message);
                                @endphp
                            @enderror
                            <label for="" class="mt-2 mb-2">Apellido Paterno</label>
                            <input type="text" class="form-control @error('paterno') is-invalid @enderror"
                                value="{{ old('paterno') }}" name="paterno" id="paterno">
                            @error('paterno')
                                @php
                                    Alert::error($message);
                                @endphp
                            @enderror
                            <label for="" class="mt-2 mb-2">Apellido materno</label>
                            <input type="text" class="form-control @error('materno') is-invalid @enderror"
                                value="{{ old('materno') }}" name="materno" id="materno">
                            @error('materno')
                                @php
                                    Alert::error($message);
                                @endphp
                            @enderror
                        </div>
                        <div class="col-1"></div>
                        <div class="col-5 mt-3">
                            <label for="" class="mt-4 mb-2">Fecha de nacimiento</label>
                            <input type="date" class="form-control @error('fechaNacimiento') is-invalid @enderror"
                                value="{{ old('fechaNacimiento') }}" name="fechaNacimiento" id="fechaNacimiento">
                            @error('fechaNacimiento')
                                @php
                                    Alert::error($message);
                                @endphp
                            @enderror
                            <label for="" class="mt-2 mb-2">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" name="email" id="email">
                            @error('email')
                                @php
                                    Alert::error($message);
                                @endphp
                            @enderror
                            <label for="" class="mt-2 mb-2">Genero</label>
                            <select name="genero" id="genero" class="form-select @error('genero') is-invalid @enderror">
                                <option value="{{ old('genero') }}" selected>Seleccionar</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                            @error('genero')
                                @php
                                    Alert::error($message);
                                @endphp
                            @enderror
                            <label for="" class="mb-2 mt-2">Numero de Celular</label>
                            <input type="text" class="form-control @error('numeroCelular') is-invalid @enderror"
                                value="{{ old('numeroCelular') }}" name="numeroCelular" id="numeroCelular">
                            @error('numeroCelular')
                                @php
                                    Alert::error($message);
                                @endphp
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <button type="submit"
                                class="btn btn-light container-fluid pt-2 pb-2 rounded-4 mt-4 mb-4">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('shared/flotanteSadmin')
    @include('shared/footer')
@endsection
