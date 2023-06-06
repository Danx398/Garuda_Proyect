@extends('layouts/main')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/b5Datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endsection
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
                <table class="table text-center table-bordered table-striped text-light" id="admin">
                    <thead class="bg-primary">
                        <th>Nombre</th>
                        <th>Numero de control</th>
                        <th>Fecha de nacimiento</th>
                        <th>Carrera</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody class="text-primary">
                        {{-- <tr>
                            <td>Jose Alberto Velazquez Nava</td>
                            <td>191190060</td>
                            <td>17/04/2001</td>
                            <td>Sistemas</td>
                            <td>
                                <a href="" class="btn btn-danger">Eliminar</a>
                                <a href="" class="btn btn-warning">Editar</a>
                            </td>
                        </tr> --}}
                        @foreach ($datos as $item)
                            <tr>
                                <td>{{$item->nombre}}     {{$item->paterno}} {{$item->materno}}</td>
                                <td>{{$item->num_control}}</td>
                                <td>{{$item->fechaNac}}</td>
                                <td>{{$item->carrera}}</td>
                                <td>
                                    <a href="{{route('evidencias-admin')}}" class="btn btn-primary"><i class="fa-solid fa-users-gear"></i></a>
                                    <a href="" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('shared/footer')
@endsection
@section('js')
    <script src="{{ asset('js/bootstrapDT.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#admin').DataTable({
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        });
    </script>
@endsection