@extends('layouts/main')
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <H1 class="text-center mt-3">Créditos en tramite</H1>
        <div class="row">
            <div class="col">
                <table class="table text-light text-center mt-5 table-striped">
                    <thead class="bg-primary">
                        <th>Nombre</th>
                        <th>Numero de control</th>
                        <th>Estatus</th>
                        <th>Carrera</th>
                        <th>Creditos</th>
                        <th>Agregar evidencia</th>
                        <th>+</th>
                    </thead>
                    <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('shared/flotanteAdmin')
    @include('shared/footer')
@endsection