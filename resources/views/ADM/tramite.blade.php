@extends('layouts/main')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <H1 class="text-center mt-3">Créditos en tramite</H1>
        <div class="row">
            <div class="col">
                <table class="table text-light text-center mt-5 table-striped" id="Ctramite">
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
@section('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#Ctramite').DataTable({
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
@endsection
