@extends('layouts/main')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/b5Datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endsection
@section('contenido')
    @include('shared/nav')
    {{-- {{ $datos }} --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg col-md-6 col-sm-12">
                <div class="row justify-content-between">
                    <div class="col-2"></div>
                    <div class="col-2 mt-5">
                        <a href="{{ route('registrar-admin') }}" class="btn btn-primary container-fluid pt-4 pb-4">
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
                        <a href="{{ route('tramite-admin') }}" class="btn btn-primary container-fluid pt-4 pb-4">
                            <div class="row mb-3">
                                <div class="col">
                                    <i class="fa-solid fa-list-ul fa-2xl"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Creditos
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- <div class="col-2 mt-5">
                        <a href="{{ route('liberado-admin') }}" class="btn btn-primary container-fluid pt-4 pb-4">
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
                    </div> --}}
                    <div class="col-2"></div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <table class="table text-center table-bordered table-striped text-primary" id="admin">
                    <thead class="bg-primary text-light">
                        <th>Nombre</th>
                        <th>Numero de control</th>
                        <th>Fecha de nacimiento</th>
                        <th>Carrera</th>
                        <th>Acciones</th>
                    </thead>
                    @foreach ($datos as $item)
                        <tr>
                            <td>{{ $item->nombre }} {{ $item->paterno }} {{ $item->materno }}</td>
                            <td>{{ $item->num_control }}</td>
                            <td>{{ $item->fechaNac }}</td>
                            <td>{{ $item->carrera }}</td>
                            <td>
                                <a href="{{ route('evidencias-admin', $item->id_alumno) }}" class="btn btn-primary"><i
                                        class="fa-solid fa-users-gear"></i></a>
                                <a href="{{ route('editar-admin', $item->id_alumno) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <div class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#eliminarModal{{ $item->id_alumno }}">
                                    <i class="fa-solid fa-trash"></i>
                                    <div class="modal fade" id="eliminarModal{{ $item->id_alumno }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                ¿Estas seguro de que deseas eliminar a este estudiante?
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col display-5 p-2">
                                                                {{ $item->nombre }}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col display-4 p-2">
                                                                {{ $item->num_control }}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col p-2">
                                                                Recuerda que ya no se podra recuperar la informacion
                                                                despues de eliminarlo
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                                        No, Cancelar
                                                    </button>
                                                    <form action="{{ route('destroy-admin', $item->id_alumno) }}"
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
