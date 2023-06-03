@extends('layouts/main')
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <h1 class="text-center mt-3">Agregar evidencia</h1>
        <div class="row justify-content-center mt-5">
            <div class="col-10">
                <form action="" class="form-control bg-primary text-light">
                    <div class="row justify-content-center text-center mt-3">
                        <div class="col-5 pt-2 pb-2">
                            <label for="">Seleccionar actividad o mooc</label>
                            <select name="" id="" class="form-control mt-2">
                                <option value="" selected>Seleccionar Actividad o Mooc</option>
                                <option value="Actividad">Actividad</option>
                                <option value="Mooc">Mooc</option>
                            </select>
                            <label for="" class="mt-1">Crédito a liberar</label>
                            <select name="" id="" class="form-control mt-2">
                                <option selected>Seleccionar Crédito</option>
                                <option value="Academico">Academico</option>
                                <option value="Civico">Civico</option>
                                <option value="Cultural">Cultural</option>
                                <option value="Deportivo">Deportivo</option>
                            </select>
                            <label for="" class="mt-3">Nombre del evento, actividad o mooc</label>
                            <input type="text" class="form-control mt-2" disabled>
                            <label for="" class="mt-3">Subir evidencia</label>
                            <input type="file" name="" id="" class="form-control mt-2" disabled>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-5">
                            <div class="row justify-content-center text-center mt-4">
                                <div class="col-6 fs-5">Nombre estudiante</div>
                                <div class="col-6 fs-5">Numero de control</div>
                            </div>
                            <div class="row mt-5">
                                <label for="" class="mt-5">Horas realizadas</label>
                                <input type="text" disabled class="form-control mt-2">
                            </div>

                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <button class="btn btn-light container-fluid pt-2 pb-2 rounded-4 mt-5 mb-3">Agregar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('shared/footer')
@endsection
