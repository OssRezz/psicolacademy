@extends('layouts.layout')
@section('title', 'Matriculas')
@section('content')
    <div class="row d-flex align-items-center mb-4">
        <div class="col">
            <a class="btn btn-danger" href="{{ route('admin.matriculas.create') }}">
                <i class="fas fa-plus-square"></i> Crear matricula
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
                    <i class="fa-solid fa-chalkboard text-primary"></i> Lista de matriculas
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-stripped table-bordered table-sm" id="TableMatriculas"
                            style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-start">Estudiante</th>
                                    <th class="text-end">Creditos</th>
                                    <th class="text-end">Semestre</th>
                                    <th class="text-center">Asignaturas</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($matriculas as $item)
                                    <tr>
                                        <td>{{ $item->estudiante->nombres . ' ' . $item->estudiante->apellidos }}</td>
                                        <td class="text-end">{{ $item->creditos }}</td>
                                        <td class="text-end">{{ $item->semestre }}</td>
                                        <td class="text-center">
                                            <div class="badge bg-{{ $item->asignaturas == 1 ? 'success' : 'danger' }}">
                                                {{ $item->asignaturas == 1 ? 'Completo' : 'Sin asignaturas' }}</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="badge bg-{{ $item->estado == 1 ? 'success' : 'primary' }}">
                                                {{ $item->estado == 1 ? 'En proceso' : 'Finalizado' }}</div>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-outline-danger border-0 btn-sm"
                                                href="{{ route('admin.matriculas.edit', $item->id) }}">
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
    <script src="{{ asset('js/matriculas/datatable.js') }}"></script>
@endsection
