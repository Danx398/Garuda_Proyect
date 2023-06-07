@extends('layouts/main')
@section('contenido')
    @include('shared/navSuper')
    <div class="container">
        <h1 class="text-center mb-4 mt-3">Cambiar contraseña </h1>
        <div class="row justify-content-center mt-3">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="bg-primary p-5 text-light fs-5 rounded-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <div>Usuario: {{ $datos->name }}</div>
                                <div>Correo electronico: {{ $datos->email }}</div>
                                <div>Nombre: {{ $datos->nombre }} {{ $datos->paterno }} {{ $datos->materno }}</div>
                                <div>Edad: {{ $edad }}</div>
                            </div>
                            <div class="col-4">
                                <img src="{{ asset('img/llave.png') }}" class="w-75" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
        <form action="{{ route('cambiar-contrasenia', $datos->id_user) }}" method="POST">
            @csrf
            @method('POST')
            <div class="row justify-content-between text-center mt-5">
                <div class="col-4">
                    <label for="" class="fs-5">Contraseña Nueva</label>
                    <input type="texto" class="form-control @error('ContraseniaNueva') is-invalid @enderror"
                        name="ContraseniaNueva" value="{{old('ContraseniaNueva')}}">
                    @error('ContraseniaNueva')
                        @php
                            Alert::error($message);
                        @endphp
                    @enderror
                </div>
                <div class="col-4"></div>
                <div class="col-4">
                    <label for="" class="fs-5">Confirmar Contraseña</label>
                    <input type="password" class="form-control @error('ContraseniaConfirmar') is-invalid @enderror" name="ContraseniaConfirmar" value="{{old('ContraseniaConfirmar')}}">
                </div>
                @error('ContraseniaConfirmar')
                        @php
                            Alert::error($message);
                        @endphp
                    @enderror
                <div class="row justify-content-center">
                    <div class="col-2">
                        <button class="btn btn-primary container-fluid pt-2 pb-2 rounded-4 fs-4 mt-5">Cambiar</button>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('cambio-sadmin') }}"
                            class="btn btn-primary container-fluid pt-2 pb-2 rounded-4 fs-4 mt-5">Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @include('shared/footer')
@endsection
