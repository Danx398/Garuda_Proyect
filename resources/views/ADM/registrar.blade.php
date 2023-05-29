@extends('layouts/main')
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <h1 class="text-center mt-3">Registrar Alumno</h1>
        <div class="row justify-content-center text-center mt-4">
            <div class="col-10">
                <form action="" class="form-control bg-primary text-light">
                    <div class="row justify-content-center text-center mt-5">
                        <div class="col-5">
                            <label for="" class="">Nombre</label>
                            <input type="text" class="form-control">
                            <label for="" class="mt-2">Apellido paterno</label>
                            <input type="password" class="form-control">
                            <label for="" class="mt-2">Apellido materno</label>
                            <input type="password" class="form-control">
                            <label for="" class="mt-2">Genero</label>
                            <input type="password" class="form-control">
                            <label for="" class="mt-2">Numero de control</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="col-1"></div> 
                        <div class="col-5">
                            <label for="" class="">Numero celular</label>
                            <input type="text" class="form-control">
                            <label for="" class="mt-2">Fecha de nacimiento</label>
                            <input type="date" class="form-control">
                            <label for="" class="mt-2">Carrera</label>
                            <input type="password" class="form-control">
                            <label for="" class="mt-2">Escuela de procedencia</label>
                            <input type="password" class="form-control">
                            <label for="" class="mt-2">Fecha de ingreso al tec</label>
                            <input type="date" class="form-control">
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
@endsection
