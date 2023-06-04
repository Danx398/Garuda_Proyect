@extends('layouts/main')
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <H1 class="text-center mt-3">Actualizar contraseña</H1>
        <div class="row">
            <div class="col">
                <table class="table text-light text-center mt-5 table-striped">
                    <thead class="bg-primary text-light">
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Actualizar</th>
                    </thead>
                    <tbody class="text-primary">
                        @foreach ($datos as $dato)
                            <tr>
                                <td>{{ $dato->name }}</td>
                                <td>{{ $dato->nombre }} {{ $dato->paterno }} {{ $dato->materno }}</td>
                                <td>
                                    <a href="{{route('cambiarPass-sadmin',$dato->id)}}" class="btn btn-primary">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('shared/flotanteSadmin')
    @include('shared/footer')
@endsection
