@extends('layouts/main')
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg col-md-6 col-sm-12">
                <div class="row justify-content-between">
                    <div class="col-2"></div>
                    <div class="col-2 mt-5">
                        <a href="{{route('registrar-admin')}}" class="btn btn-primary container-fluid pt-4 pb-4">
                            <div class="row mb-3">
                                <div class="col">
                                    <i class="fa-solid fa-user fa-2xl"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Registrar <br> Alumno
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-2 mt-5">
                        <a href="{{route('tramite-admin')}}" class="btn btn-primary container-fluid pt-4 pb-4">
                            <div class="row mb-3">
                                <div class="col">
                                    <i class="fa-solid fa-list-ul fa-2xl"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Creditos <br> en tramite
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-2 mt-5">
                        <a href="{{route('liberado-admin')}}" class="btn btn-primary container-fluid pt-4 pb-4">
                            <div class="row mb-3">
                                <div class="col">
                                    <i class="fa-solid fa-list-check fa-2xl"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Creditos <br> liberados
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <table class="table text-center table-bordered table-striped text-light">
                    <thead class="bg-primary">
                        <th>Nombre</th>
                        <th>Numero de control</th>
                        <th>Fecha de nacimiento</th>
                        <th>Carrera</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jose Alberto Velazquez Nava</td>
                            <td>191190060</td>
                            <td>17/04/2001</td>
                            <td>Sistemas</td>
                            <td>
                                <a href="" class="btn btn-danger">Eliminar</a>
                                <a href="" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('shared/footer')
@endsection
