@extends('layouts/main')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/b5Datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endsection
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <H1 class="text-center mt-3">Actualizar contraseña</H1>
        <div class="row">
            <div class="col">
                <table class="table text-light text-center mt-5 table-striped" id="cambioUser">
                    <thead class="bg-primary text-light">
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Actualizar</th>
                    </thead>
                    <tbody class="text-primary">
                        @foreach ($datos as $dato)
                            <tr>
                                <td>{{ $dato->name }}</td>
                                <td>{{ $dato->nombre }} {{ $dato->paterno }} {{ $dato->materno }}</td>
                                <td>
                                    <a href="{{ route('cambiarPass-sadmin', $dato->id) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('shared/flotanteSadmin')
    @include('shared/footer')
@endsection
@section('js')
    <script src="{{ asset('js/bootstrapDT.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#cambioUser').DataTable({
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
