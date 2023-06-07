@extends('layouts/main')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/b5Datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endsection
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <h1 class="text-center mt-3">{{ $titulo }}</h1>
        <div class="row">
            <div class="col">
                <table class="table table-responsive mt-4 table-striped" id="evidencias">
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
@endsection
@section('js')
    <script src="{{ asset('js/bootstrapDT.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#evidencias').DataTable({
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