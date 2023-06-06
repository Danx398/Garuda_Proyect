@extends('layouts/main')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/b5Datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endsection
@section('contenido')
    @include('shared/navSuper')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg col-md-10 col-sm-12">
                <div class="row justify-content-between">
                    <div class="col-2"></div>
                    <div class="col-2 mt-5">
                        <a href="{{ route('nuevo-sadmin') }}"
                            class="btn btn-primary container-fluid pt-4 pb-4 text-decoration-none text-light">
                            <div class="row mb-3">
                                <div class="col">
                                    <i class="fa-solid fa-user fa-2xl"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Nuevo <br>Admin
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-2 mt-5">
                        <a href="{{ route('cambio-sadmin') }}"
                            class="btn btn-primary container-fluid text-decoration-none text-light pt-4 pb-4">
                            <div class="row mb-3">
                                <div class="col">
                                    <i class="fa-solid fa-key fa-2xl"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Cambiar <br> contraseña
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
                <table class="table text-center table-bordered table-striped table-responsive" id="sadmn">
                    <thead class="bg-primary text-light">
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Ver mas</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody class="text-primary">
                        @foreach ($datos as $dato)
                            <tr>
                                <td>{{ $dato->name }}</td>
                                <td>{{ $dato->nombre }} {{ $dato->paterno }} {{ $dato->materno }}</td>
                                <td>{{ $dato->email }}</td>
                                <td>
                                    <div class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $dato->id }}">
                                        <i class="fa-solid fa-square-plus"></i>
                                        <div class="modal fade" id="exampleModal{{ $dato->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content bg-primary text-light">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Información de
                                                            Usuario</h1>
                                                        <button type="button" class="btn-close btn btn-light bg-light"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class=""><b>Usuario: </b>{{ $dato->name }}
                                                                    </div>
                                                                    <div class=""><b>Nombre: </b>{{ $dato->nombre }}
                                                                        {{ $dato->paterno }} {{ $dato->materno }} </div>
                                                                    <div class=""><b>Email: </b>{{ $dato->email }}
                                                                    </div>
                                                                    <div class=""><b>Num. Celular:
                                                                        </b>{{ $dato->num_celular }}</div>
                                                                    <div class=""><b>Genero: </b>{{ $dato->genero }}
                                                                    </div>
                                                                    <div class=""><b>Fecha Nacimiento:
                                                                        </b>{{ $dato->fechaNac }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('editar-sadmin', $dato->id) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <div class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#eliminarModal{{ $dato->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                        <div class="modal fade" id="eliminarModal{{ $dato->id }}" tabindex="-1"
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
                                                                <div class="col">
                                                                    ¿Estas seguro de que deseas eliminar a este usuario?
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col display-5">
                                                                    {{ $dato->name }}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    Recuerda que ya no se podra recuperar la informacion
                                                                    despues de eliminarlo
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">No, Cancelar</button>
                                                        <form action="{{ route('destroy-sadmin', $dato->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Si,
                                                                Eliminar</button>
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
            $('#sadmn').DataTable({
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
