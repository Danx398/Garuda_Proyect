@extends('layouts/main')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/b5Datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endsection
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <h1 class="text-center mt-3">Constancias Liberadas de {{ $alumno->num_control }}</h1>
        <div class="row">
            <div class="col">
                <table class="table table-responsive mt-4 table-striped" id="constancias">
                    <thead class="bg-primary text-light text-center">
                        <th>Evento (act o mooc)</th>
                        <th>Credito</th>
                        <th>Estatus</th>
                        <th>Ruta fisica</th>
                        <th>Fecha de modificación</th>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($extraescolar as $item)
                        <tr>
                            <td>{{$item->evidencia}}</td>
                            <td>{{$item->credito}}</td>
                            <td>{{$item->estatus}}</td>
                            <td>{{$item->ruta_fisica}}</td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('shared/footer')
    @include('shared/flotanteAdmin')
@endsection
@section('js')
    <script src="{{ asset('js/bootstrapDT.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#constancias').DataTable({
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
