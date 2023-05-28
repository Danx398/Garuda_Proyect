@extends('layouts/main')
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <h1 class="text-center mt-3">Agregar evidencia</h1>
        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <form action="" class="form-control bg-primary text-light">
                    <div class="row justify-content-center text-center">
                        <div class="col-5 pt-2 pb-2">
                            <select name="" id="" class="form-control">
                                <option value="" selected>Seleccionar (act,mooc)</option>
                                <option value="">Actividad</option>
                                <option value="">Mooc</option>
                            </select>
                            <input type="text" class="mt-5 form-control" disabled placeholder="Evento, Actividad o Mooc">
                            <input type="file" name="" id="" class="form-control mt-5" disabled>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-5">
                            <div class="row justify-content-center text-center mt-5">
                                <div class="col-6 fs-5">Nombre estudiante</div>
                                <div class="col-6 fs-5">Numero de control</div>
                            </div>
                            <div class="row mt-5">
                                <input type="text" disabled class="form-control mt-5" placeholder="Horas realizadas">
                            </div>

                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <button class="btn btn-light container-fluid pt-2 pb-2 rounded-4 mt-5">Agregar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
