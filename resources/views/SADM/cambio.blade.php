@extends('layouts/main')
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <H1 class="text-center mt-3">Cambiar contraseña</H1>
        <div class="row">
            <div class="col">
                <table class="table text-light text-center mt-5 table-striped">
                    <thead class="bg-primary">
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Cambiar</th>
                    </thead>
                    <tbody>
                        <td>Joss</td>
                        <td>Jose Alberto Velazquez Nava</td>
                        <td>
                            <a href="" class="btn btn-primary">Cambiar</a>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('shared/flotanteAdmin')
    @include('shared/footer')
@endsection
