@extends('layouts/main')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/b5Datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endsection
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <H1 class="text-center mt-3">Créditos en tramite</H1>
        <div class="row">
            <div class="col">
                <table class="table text-light text-center mt-5 table-striped" id="tramite">
                    <thead class="bg-primary">
                        <th>Nombre</th>
                        <th>Numero de control</th>
                        <th>Estatus</th>
                        <th>Carrera</th>
                        <th>Creditos</th>
                        <th>Evidencias</th>
                        <th>ver mas</th>
                    </thead>
                    <tbody class="text-center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            {{-- <button class="btn btn-primary"><i class="fa-solid fa-file-circle-plus"></i></button> --}}
                            <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                        </td>
                        <td>
                            <button class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('shared/flotanteAdmin')
    @include('shared/footer')
@endsection
@section('js')
    <script src="{{ asset('js/bootstrapDT.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#tramite').DataTable({
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
