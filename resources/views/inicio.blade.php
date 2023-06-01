@extends('layouts/main')
@section('contenido')
    <div class="container text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <form action="{{ route('logear') }}" class="form-control bg-primary py-3 text-center rounded-5 mt-5"
                    method="POST">
                    @method('POST')
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <img src="{{ asset('img/usuario1.png') }}" alt="usuarios">
                        </div>
                    </div>
                    <label for="user" class="text-light fs-3 mb-3">Usuario</label>
                    <input type="text" class="form-control" name="name" id="user" autofocus>
                    <label for="password" class="text-light fs-3 mt-3 mb-3">Contraseña</label>
                    <input type="password" class="form-control mb-4" name="password" id="password">
                    <div class="row p-3">
                        <div class="col">
                            <button class="btn btn-light">Iniciar Sesión</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
