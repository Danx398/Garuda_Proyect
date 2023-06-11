@extends('layouts/main')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/b5Datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endsection
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <h1 class="text-center mt-3">Evidencias de {{ $datos->num_control }}</h1>
        <div class="row">
            <div class="col">
                <table class="table table-responsive mt-4 table-striped" id="evidencias">
                    <thead class="bg-primary text-light text-center">
                        <th>Evento (act o mooc)</th>
                        <th>Credito</th>
                        <th>Horas liberadas</th>
                        <th>Estatus</th>
                        <th>Ruta fisica</th>
                        <th>Acciones</th>
                        <th>Fecha de modificación</th>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($datosExtra as $items)
                            <tr>
                                <td>{{ $items->evidencia }}</td>
                                <td>{{ $items->credito }}</td>
                                <td>{{ $items->horas_liberadas }}</td>
                                <td>{{ $items->estatus }}</td>
                                <td>{{ $items->ruta_fisica }}
                                    {{$fecha}}
                                </td>
                                <td>
                                    <div class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#derDocModal{{ $items->id_extraescolares }}">
                                        <i class="fa-solid fa-eye"></i>
                                        <div class="modal fade" id="derDocModal{{ $items->id_extraescolares }}"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content bg-primary">
                                                    <div class="modal-body">
                                                        <iframe width="1100" height="650"
                                                            src="{{ asset($items->ruta) }}" frameborder="0"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="btn btn-primary" href="{{ asset($items->ruta) }}"
                                        download="{{ $datos->num_control . '_' . $items->fk_credito . '_' . $items->evidencia . '_' . $fecha }}"><i
                                            class="fa-solid fa-download"></i></a>
                                    <div class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#eliminarModal{{ $items->id_extraescolares }}">
                                        <i class="fa-solid fa-trash"></i>
                                        <div class="modal fade" id="eliminarModal{{ $items->id_extraescolares }}"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content bg-primary">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cuidado !!</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col p-2">
                                                                    ¿Estas seguro de que deseas eliminar esta evidencia?
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col fs-4 mt-2">
                                                                    <b>Credito:</b> {{ $items->credito }}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col mb-2">
                                                                    Realizando actividad: {{ $items->evidencia }}
                                                                    <br>
                                                                    Liberando un total de {{ $items->horas_liberadas }}
                                                                    hrs.
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col p-2">
                                                                    Una vez realizado este proceso
                                                                    ya no se podra recuperar la informacion
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">
                                                            No, Cancelar
                                                        </button>
                                                        <form
                                                            action="{{ route('eliminar-extraescolar', $items->id_extraescolares) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                Si, Eliminar
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $items->created_at }}</td>
                            </tr>
                        @endforeach
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
