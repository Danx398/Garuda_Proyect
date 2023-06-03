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
                    <tbody class="text-center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="btn btn-primary"><i class="fa-solid fa-file-circle-plus"></i></button>
                            <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                        </td>
                        <td><button class="btn btn-primary"><i class="fa-solid fa-plus"></i></button></td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('shared/flotanteAdmin')
    @include('shared/footer')
@endsection
