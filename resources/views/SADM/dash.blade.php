@extends('layouts/main')
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="row justify-content-between">
                    <div class="col-2"></div>
                    <div class="col-2 mt-5">
                        <button class="btn btn-primary container-fluid pt-4 pb-4">
                            <div class="row mb-3">
                                <div class="col">
                                    {{-- <img src="{{asset('img/usuario1.png')}}" alt="" class="w-25"> --}}
                                    <i class="fa-solid fa-user fa-2xl"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Nuevo Admin
                                </div>
                            </div>
                        </button>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-2 mt-5">
                        <button class="btn btn-primary container-fluid pt-4 pb-4">
                            <div class="row mb-3">
                                <div class="col">
                                    <i class="fa-solid fa-key fa-2xl"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Cambiar contraseña
                                </div>
                            </div>
                        </button>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <table class="table text-center table-bordered table-striped text-light">
                    <thead class="bg-primary">
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>+</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
