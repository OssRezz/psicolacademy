@extends('layouts.layout')
@section('title', 'Asignatura')
@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <a class="btn btn-danger" href="{{ route('admin.asignaturas.index') }}">
                <i class="fas fa-caret-square-left"></i> Atrás
            </a>
        </div>
    </div>

    <div class="row">

        <div class="col-12 col-lg-7 mb-3">
            <div class="card shadow-sm">
                <div class="card-header  fs-5">
                    <i class="fas fa-info-circle text-primary"></i>
                    Información de la asignatura
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered nowrap table-hover" style="width: 100%" id="tablaClase">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <td>{{ $asignatura->nombre }}</td>
                                </tr>
                                <tr>
                                    <th>Descripcion</th>
                                    <td>{!! $asignatura->descripcion !!}</td>
                                </tr>
                                <tr>
                                    <th>Area</th>
                                    <td>{{ $asignatura->area->nombre }}</td>
                                </tr>
                                <tr>
                                    <th>Creditos</th>
                                    <td>{{ $asignatura->creditos }}</td>
                                </tr>
                                <tr>
                                    <th>Tipo Asignatura</th>
                                    <td>
                                        <div
                                            class="badge bg-{{ $asignatura->tipo_asignatura == 1 ? 'primary' : 'secondary' }}">
                                            {{ $asignatura->estado == 1 ? 'Electiva' : 'Obligatoria' }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Estado</th>
                                    <td>
                                        <div class="badge bg-{{ $asignatura->estado == 1 ? 'primary' : 'secondary' }}">
                                            {{ $asignatura->estado == 1 ? 'Activo' : 'Inactivo' }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Fecha de creación</th>
                                    <td>{{ date('j F, Y - h:m A', strtotime($asignatura->created_at)) }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
