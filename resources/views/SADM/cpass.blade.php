@extends('layouts/main')
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <h1 class="text-center mb-4 mt-3">Cambiar contraseña </h1>
        <div class="row justify-content-center mt-3">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="bg-primary pt-5 pb-5 text-light text-center fs-1 rounded-5">Datos del usuario</div>
            </div>
            <div class="col-2"></div>
        </div>
        <form action="">
            <div class="row justify-content-between text-center mt-5">
                <div class="col-4">
                    <label for="" class="fs-4">Contraseña Nueva</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-4"></div>
                <div class="col-4">
                    <label for="" class="fs-4">Confirmar Contraseña</label>
                    <input type="text" class="form-control">
                </div>
                <div class="row justify-content-center">
                    <div class="col-2">
                        <button class="btn btn-primary container-fluid pt-2 pb-2 rounded-4 fs-4 mt-5">Cambiar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
