@extends('layouts/main')
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <h1 class="text-center mt-3">{{ $titulo }}</h1>
        <div class="row">
            <div class="col">
                <table class="table table-responsive mt-4">
                    <thead class="bg-primary text-light text-center">
                        <th>Nombre</th>
                        <th>Numero de control</th>
                        <th>Evento (act o mooc)</th>
                        <th>Evidencias</th>
                        <th>Documentos</th>
                        <th>Fecha de modificación</th>
                    </thead>
                    <tbody class="text-center">
                        <td>D</td>
                        <td>D</td>
                        <td>D</td>
                        <td>D</td>
                        <td>
                            <button class="btn btn-primary "><i class="fa-solid fa-eye"></i></button>
                            <button class="btn btn-primary "><i class="fa-solid fa-download"></i></button>
                            <button class="btn btn-primary "><i class="fa-solid fa-trash"></i></button>
                        </td>
                        <td>D</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('shared/footer')
@endsection
