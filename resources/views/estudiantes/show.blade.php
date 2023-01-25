@extends('layouts.layout')
@section('title', 'Estudiantes')
@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <a class="btn btn-danger" href="{{ route('admin.estudiantes.index') }}">
                <i class="fas fa-caret-square-left"></i> Atrás
            </a>
        </div>
    </div>

    <div class="row">

        <div class="col-12 col-lg-7 mb-3">

            <div class="card shadow-sm">
                <div class="card-header  fs-5">
                    <i class="fas fa-info-circle text-primary"></i>
                    Información del estudiante
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered nowrap table-hover" style="width: 100%" id="tablaClase">
                            <thead>
                                <tr>
                                    <th>Nombre completo</th>
                                    <td>{{ $estudiante->nombres }} {{ $estudiante->apellidos }}</td>
                                </tr>
                                <tr>
                                    <th>Documento</th>
                                    <td>{{ $estudiante->documento }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $estudiante->email }}</td>
                                </tr>
                                <tr>
                                    <th>Telefono</th>
                                    <td>{{ $estudiante->telefono }}</td>
                                </tr>
                                <tr>
                                    <th>Departamento/Ciudad</th>
                                    <td>{{ $estudiante->departamento . ' - ' . $estudiante->ciudad }}</td>
                                </tr>
                                <tr>
                                    <th>Direccion</th>
                                    <td>{{ $estudiante->direccion }}</td>
                                </tr>
                                <tr>
                                    <th>Estado</th>
                                    <td>
                                        <div class="badge bg-{{ $estudiante->estado == 1 ? 'primary' : 'secondary' }}">
                                            {{ $estudiante->estado == 1 ? 'Activo' : 'Inactivo' }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Fecha de creación</th>
                                    <td>{{ date('j F, Y - h:m A', strtotime($estudiante->created_at)) }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if (count($ClaseMatricula) != 0)
            <div class="col-12 col-lg-7 mb-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header  fs-5">
                                <i class="fa-solid fa-chalkboard text-primary"></i> Clases matriculadas
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-stripped table-bordered table-sm" id="TableClases"
                                        style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Matricula</th>
                                                <th class="text-start">Asignatura</th>
                                                <th class="text-start">Profesor</th>
                                                <th class="text-center">Hora inicio</th>
                                                <th class="text-center">Hora fin</th>
                                                <th class="text-end">Creditos</th>
                                                <th class="text-end">Semestre</th>
                                                <th class="text-center">Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ClaseMatricula as $item)
                                                <tr>
                                                    <td class="text-end">#{{ $item->matricula_id }}</td>
                                                    <td class="text-start">{{ $item->nombre_asignatura }}</td>
                                                    <td lass="text-start">
                                                        {{ $item->nombre_profesor . ' ' . $item->apellido_profesor }}
                                                    </td>
                                                    <td class="text-center">{{ $item->hora_inicio }}</td>
                                                    <td class="text-center">{{ $item->hora_fin }}</td>
                                                    <td class="text-end">{{ $item->credito_matricula }}</td>
                                                    <td class="text-end">{{ $item->semestre }}</td>
                                                    <td class="text-center">
                                                        <div
                                                            class="badge bg-{{ $item->estado == 1 ? 'success' : 'primary' }}">
                                                            {{ $item->estado == 1 ? 'En proceso' : 'Finalizado' }}
                                                        </div>
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
                <script src="{{ asset('js/semestres/datatable.js') }}"></script>
            </div>
        @endif

    </div>
@endsection
