@extends('layouts/main')
@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 mt-5">
                <form action="" class="form-control mt-5 colorForms py-3 text-center shadow-lg" method="POST">
                    <label for="user" class="text-light fs-3">Usuario</label>
                    <input type="text" class="form-control rounded" name="user" id="user" autofocus>                    
                    <label for="user" class="text-light fs-3 mt-3">Contraseña</label>
                    <input type="password" class="form-control mb-4" name="user" id="user">
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary">Iniciar Sesión</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
