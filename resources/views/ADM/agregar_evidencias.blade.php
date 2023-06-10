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
                        @enderror" disabled>
                                <option selected value="">Seleccionar Crédito</option>
                               @foreach ($items as $item)
                                   <option value="{{$item->id}}">{{$item->credito}}</option>
                               @endforeach
                                
                            </select>
                            @error('credito')
                                @php
                                    Alert::error($message);
                                @endphp
                            @enderror
                            <label for="" class="mt-3">Nombre del evento, actividad o mooc</label>
                            <input type="text" name="nombre_evento" id='nombre_evento' class="form-control mt-2 @error('nombre_evento') is-invalid @enderror" value="{{ old('nombre_evento') }}" disabled>
                            @error('nombre_evento')
                                @php
                                    Alert::error($message);
                                @endphp
                            @enderror
                            <label for="" class="mt-3">Subir evidencia</label>
                            <input type="file" name="archivo" id="archivo" class="form-control mt-2 @error('archivo') is-invalid @enderror" disabled accept=".pdf">
                            @error('archivo')
                                @php
                                    Alert::error($message);
                                @endphp
                            @enderror
                            <div class="row mt-4">
                                <div class="col">
                                 <label for="" class="">Horas realizadas</label>
                                 <input type="text" name="horas" id='horas' class="form-control mt-2 @error('horas')
                                     is-invalid
                                 @enderror" disabled>
                                 @error('horas')
                                     @php
                                         Alert::error($message)
                                     @endphp
                                 @enderror
                                </div>
                             </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-5 pt-5 mt-5">
                            <div class="row justify-content-center text-center mt-4">
                                <div class="col-6"><h5><b>Nombre estudiante: </b></h5></div>
                                <div class="col-6"><h5><b>Numero de control: </b></h5></div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-6"><i>{{ $datos->nombre }} {{ $datos->paterno }} {{ $datos->materno }}</i>
                                </div>
                                <div class="col-6"><i>{{ $datos->num_control }}</i></div>
                            </div>
                            <div class="row justify-content-center mt-5">
                                <div class="col fs-3" id="civicos" hidden>Horas Civicos Liberados {{$horasCivicas}}, Horas faltantes: {{20-$horasCivicas < 0 ?'0':20-$horasCivicas}}</div>
                                <div class="col fs-3" id="deportivos" hidden>Horas Deportivos Liberados {{$horasDeportivas}}, Horas faltantes: {{20-$horasDeportivas < 0 ?'0':20-$horasDeportivas}}</div>
                                {{-- <div class="" id="horasCivicas">{{20-$horasCivicas <0 ?'0':20-$horasCivicas}}</div> --}}
                                    <input hidden type="text" id="horasCivicas" name='horasCivicas' value="{{20-$horasCivicas <0 ?0:20-$horasCivicas}}" disabled>
                                        <input hidden type="text" id="horasDeportivas" value="{{20-$horasDeportivas <0 ?0:20-$horasDeportivas}}" disabled>
                                        <input hidden type="text" id="horasCulturales" value="{{20-$horasCulturales <0 ?0:20-$horasCulturales}}" disabled>
                                <div class="col fs-3" id="culturales" hidden>Horas Culturales Liberados {{$horasCulturales}}, Horas faltantes: {{20-$horasCulturales < 0 ?'0':20-$horasCulturales}}</div>
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
