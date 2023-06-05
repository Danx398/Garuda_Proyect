@extends('layouts/main')
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
                <table class="table text-center table-bordered table-striped table-responsive">
                    <thead class="bg-primary text-light">
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>+</th>
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
                                    <a href="" class="btn btn-primary">
                                        <i class="fa-solid fa-square-plus"></i>
                                        {{-- aqui la modal --}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('editar-sadmin', $dato->id) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('destroy-sadmin', $dato->id) }}" method="POST" data-confirm-delete="true">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-primary">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    {{-- <a href="{{ route('destroy-sadmin', $dato->id) }}" class="btn btn-primary" data-confirm-delete="true">
                                        @csrf
                                        @method('DELETE')
                                        <i class="fa-solid fa-trash"></i>
                                    </a> --}}
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
