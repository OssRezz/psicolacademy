@extends('layouts.layout')
@section('title', 'clases')
@section('content')
    <div class="row d-flex align-items-center mb-4">
        <div class="col">
            <a class="btn btn-danger" href="{{ route('admin.clases.create') }}">
                <i class="fas fa-plus-square"></i> Crear clase
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
                <div class="card-header  fs-5">
                    <i class="fa-solid fa-chalkboard text-primary"></i> Lista de clases
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-stripped table-bordered table-sm" id="TableClases"
                            style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-start">Profesor</th>
                                    <th class="text-start">Asignatura</th>
                                    <th class="text-end">Créditos</th>
                                    <th class="text-center">Hora Inicio</th>
                                    <th class="text-center">Hora Fin</th>
                                    <th class="text-center">Tipo Asignatura</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clases as $item)
                                    <tr>
                                        <td>{{ $item->profesor->nombres . ' ' . $item->profesor->apellidos }}</td>
                                        <td>{{ $item->asignatura->nombre }}</td>
                                        <td class="text-end">{{ $item->asignatura->creditos }}</td>
                                        <td class="text-center">{{ $item->hora_inicio }}</td>
                                        <td class="text-center">{{ $item->hora_fin }}</td>
                                        <td class="text-center">
                                            <div
                                                class="badge bg-{{ $item->asignatura->tipo_asignatura == 1 ? 'primary' : 'secondary' }}">
                                                {{ $item->asignatura->tipo_asignatura == 1 ? 'Electiva' : 'Obligatoria' }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="badge bg-{{ $item->estado == 1 ? 'primary' : 'secondary' }}">
                                                {{ $item->estado == 1 ? 'Activo' : 'Inactivo' }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-outline-danger border-0 btn-sm"
                                                href="{{ route('admin.clases.edit', $item->id) }}">
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
    <script src="{{ asset('js/clases/datatable.js') }}"></script>

@endsection
