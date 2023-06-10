@extends('layouts/main')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/b5Datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endsection
@section('contenido')
    @include('shared/nav')
    <div class="container">
        <H1 class="text-center mt-3">Créditos</H1>
        <div class="row">
            <div class="col">
                <table class="table text-primary text-center mt-5 table-striped" id="tramite">
                    <thead class="bg-primary text-light">
                        <th>Nombre</th>
                        <th>Numero de control</th>
                        <th>Carrera</th>
                        <th>Evidencias</th>
                        <th>ver mas</th>
                    </thead>
                    <tbody>
                        @foreach ($datos as $dato)
                            <tr>
                                <td>{{ $dato->nombre }} {{ $dato->paterno }} {{ $dato->materno }}</td>
                                <td>{{ $dato->num_control }}</td>
                                <td>{{ $dato->carrera }}</td>
                                <td>
                                    <a href="{{ route('evidencias', $dato->id_alumno) }}" class="btn btn-primary"><i
                                            class="fa-solid fa-eye"></i></a>
                                </td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#verMas{{ $dato->id_alumno }}"><i
                                            class="fa-solid fa-plus"></i></button>

                                    <div class="modal fade" id="verMas{{ $dato->id_alumno }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg-primary text-light ">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mas informacion</h1>
                                                    <button type="button" class="btn-close bg-light"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row px-3">
                                                        <div class="col">
                                                            <div>Nombre del estudiante:</div>
                                                            <div>{{ $dato->nombre }} {{ $dato->paterno }}
                                                                {{ $dato->materno }}</div>
                                                        </div>
                                                        <div class="col">
                                                            <div>numero de control:</div>
                                                            <div>{{ $dato->num_control }}</div>
                                                        </div>
                                                    </div>
                                                    @foreach ($datosExtra as $extraescolares)
                                                        @if ($extraescolares->fk_alumno == $dato->id_alumno)
                                                            <div class="row mt-3">
                                                                <div class="col">
                                                                    <div class="fs-4"><b>Credito:</b>
                                                                        {{ $extraescolares->credito }}</div>
                                                                </div>
                                                            </div>
                                                            <div class="row px-3">
                                                                <div class="col-9">
                                                                    <div><b>Tipo de evidencia:</b>
                                                                        {{ $extraescolares->tipo_evidencia }}</div>
                                                                    <div><b>Evento o actividad:</b>
                                                                        {{ $extraescolares->evidencia }}</div>
                                                                    <div><b>Ruta fisica:</b>
                                                                        {{ $extraescolares->ruta_fisica }}
                                                                    </div>
                                                                    <div><b>Horas liberadas:</b>
                                                                        {{ $extraescolares->horas_liberadas }} horas.</div>
                                                                </div>
                                                                <div class="col-3 mt-5">
                                                                    <a href="{{ route('liberar-admin', [$extraescolares->id_extraescolares,$dato->id_alumno]) }}"
                                                                        class="btn btn-light">Liberar</a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
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
