@extends('layouts/main')
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <h1 class="text-center mt-3">Agregar evidencia</h1>
        <div class="row justify-content-center mt-5">
            <div class="col-10">
                <form action="{{ route('agregarEvidencia-admin', $datos->id_alumno) }}"
                    class="form-control bg-primary text-light" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="text" name="num_control" id="" hidden value="{{ $datos->num_control }}">
                    <div class="row justify-content-center text-center mt-3">
                        <div class="col-5 pt-2 pb-2">
                            <label for="">Seleccionar actividad o mooc</label>
                            <select name="actividad" id="actividad"
                                class="form-control mt-2 @error('actividad')
                            is-invalid                            
                        @enderror">
                                <option value="" selected>Seleccionar Actividad o Mooc</option>
                                <option value="Actividad">Actividad</option>
                                <option value="Mooc">Mooc</option>
                            </select>
                            @error('actividad')
                                @php
                                    Alert::error($message);
                                @endphp
                            @enderror
                            <label for="" class="mt-1">Crédito a liberar</label>
                            <select name="credito" id="credito"
                                class="form-control mt-2 @error('credito')
                        is-invalid 
                        @enderror">
                                <option selected value="">Seleccionar Crédito</option>
                                <option value="Academico">Academico</option>
                                <option value="Civico">Civico</option>
                                <option value="Cultural">Cultural</option>
                                <option value="Deportivo">Deportivo</option>
                            </select>
                            @error('credito')
                                @php
                                    Alert::error($message);
                                @endphp
                            @enderror
                            <label for="" class="mt-3">Nombre del evento, actividad o mooc</label>
                            <input type="text" name="nombre_evento" class="form-control mt-2 @error('nombre_evento') is-invalid @enderror" value="{{ old('nombre_evento') }}">
                            @error('nombre_evento')
                                @php
                                    Alert::error($message);
                                @endphp
                            @enderror
                            <label for="" class="mt-3">Subir evidencia</label>
                            <input type="file" name="archivo" id="archivo" class="form-control mt-2 @error('archivo') is-invalid @enderror">
                            @error('archivo')
                                @php
                                    Alert::error($message);
                                @endphp
                            @enderror

                        </div>
                        <div class="col-1"></div>
                        <div class="col-5">
                            <div class="row justify-content-center text-center mt-4">
                                <div class="col-6 fs-4">Nombre estudiante</div>
                                <div class="col-6 fs-4">Numero de control</div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-6 fs-5">{{ $datos->nombre }} {{ $datos->paterno }} {{ $datos->materno }}
                                </div>
                                <div class="col-6 fs-5">{{ $datos->num_control }}</div>
                            </div>
                            <div class="row mt-5">
                                <label for="" class="mt-5">Horas realizadas</label>
                                <input type="text" class="form-control mt-2" name="horas">
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
    @include('shared/flotanteAdmin')
    @include('shared/footer')
@endsection
