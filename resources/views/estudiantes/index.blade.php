@extends('layouts.layout')
@section('title', 'Estudiantes')
@section('content')
    <div class="row d-flex align-items-center mb-4">
        <div class="col">
            <a class="btn btn-danger" href="{{ route('admin.estudiantes.create') }}">
                <i class="fas fa-plus-square"></i> Crear Estudiante
            </a>
        </div>
    </div>
    <div class="row mb-0">
        <div class="col">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show d-flex justify-content-bewteen align-items-center mb-1"
                    role="alert">
                    <div class="col-10">
                        <i class="fa-solid fa-circle-info"></i> <b>{{ session('message') }}</b>
                    </div>
                    <div class="col-2 d-flex align-items-center text-center">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header fs-5">
                    <i class="fa-solid fa-graduation-cap text-primary"></i> Lista de Estudiantes
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-stripped table-bordered table-sm" id="TableUsuarios"
                            style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-start">Documento</th>
                                    <th class="text-start">Nombres</th>
                                    <th class="text-start">Email</th>
                                    <th class="none">Teléfono</th>
                                    <th class="none">Dirección</th>
                                    <th class="none">Ciudad</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Clases</th>
                                    <th class="text-center">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estudiantes as $item)
                                    <tr>
                                        <td>{{ $item->documento }}</td>
                                        <td>{{ $item->nombres . ' ' . $item->apellidos }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->telefono }}</td>
                                        <td>{{ $item->direccion }}</td>
                                        <td>{{ $item->departamento . ' - ' . $item->ciudad }}</td>
                                        <td class="text-center">
                                            <div class="badge bg-{{ $item->estado == 1 ? 'primary' : 'secondary' }}">
                                                {{ $item->estado == 1 ? 'Activo' : 'Inactivo' }}</div>
                                        </td>
                                        <td class="text-center">

                                            <a class="btn btn-outline-danger border-0 btn-sm "
                                                href="{{ url('admin/report', $item->id) }}">
                                                <small>Descargar</small>
                                            </a>
                                        </td>

                                        <td class="text-center">
                                            <a class="btn btn-outline-danger border-0 btn-sm"
                                                href="{{ route('admin.estudiantes.show', $item->id) }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a class="btn btn-outline-danger border-0 btn-sm"
                                                href="{{ route('admin.estudiantes.edit', $item->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/estudiantes/datatable.js') }}"></script>

@endsection
