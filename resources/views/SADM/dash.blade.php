@extends('layouts/main')
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="row justify-content-between">
                    <div class="col-2"></div>
                    <div class="col-2 mt-5">
                        <button class="btn btn-dark container-fluid colorForms pt-5 pb-5">Nuevo Admin</button>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-2 mt-5">
                        <button class="btn btn-dark container-fluid colorForms pt-5 pb-4">Cambiar contraseña</button>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <table class="table text-center colorForms">
                    <thead>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>+</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
