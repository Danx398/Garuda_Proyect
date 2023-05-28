@extends('layouts/main')
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <h1 class="text-center mt-3">Registrar Administrador</h1>
        <div class="row justify-content-center text-center mt-4">
            <div class="col-7">
                <form action="" class="form-control bg-primary text-light">
                    <div class="row justify-content-center text-center mt-5">
                        <div class="col-5">
                            <label for="" class="">Usuario</label>
                            <input type="text" class="form-control">
                            <label for="" class="mt-2">Contraseña</label>
                            <input type="password" class="form-control">
                            <label for="" class="mt-2">Nombre</label>
                            <input type="password" class="form-control">
                            <label for="" class="mt-2">Apellido Paterno</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="col-1"></div> 
                        <div class="col-5">
                            <label for="" class="">Apellido materno</label>
                            <input type="text" class="form-control">
                            <label for="" class="mt-2">Fecha de nacimiento</label>
                            <input type="password" class="form-control">
                            <label for="" class="mt-2">Email</label>
                            <input type="password" class="form-control">
                            <label for="" class="mt-2">Genero</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-3">
                                <button class="btn btn-light container-fluid pt-2 pb-2 rounded-4 mt-5">Registrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
