@extends('layouts.layout')
@section('title', 'profesor')
@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <a class="btn btn-danger" href="{{ route('admin.profesores.index') }}">
                <i class="fas fa-caret-square-left"></i> Atrás
            </a>
        </div>
    </div>

    <div class="row">

        <div class="col-12 col-lg-7 mb-3">
            <div class="card shadow-sm">
                <div class="card-header  fs-5">
                    <i class="fas fa-info-circle text-primary"></i>
                    Información del profesor
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered nowrap table-hover" style="width: 100%" id="tablaClase">
                            <thead>
                                <tr>
                                    <th>Nombre completo</th>
                                    <td>{{ $profesor->nombres }} {{ $profesor->apellidos }}</td>
                                </tr>
                                <tr>
                                    <th>Documento</th>
                                    <td>{{ $profesor->documento }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $profesor->email }}</td>
                                </tr>
                                <tr>
                                    <th>Telefono</th>
                                    <td>{{ $profesor->telefono }}</td>
                                </tr>
                                <tr>
                                    <th>Departamento/Ciudad</th>
                                    <td>{{ $profesor->departamento . ' - ' . $profesor->ciudad }}</td>
                                </tr>
                                <tr>
                                    <th>Direccion</th>
                                    <td>{{ $profesor->direccion }}</td>
                                </tr>
                                <tr>
                                    <th>Estado</th>
                                    <td>
                                        <div class="badge bg-{{ $profesor->estado == 1 ? 'primary' : 'secondary' }}">
                                            {{ $profesor->estado == 1 ? 'Activo' : 'Inactivo' }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Fecha de creación</th>
                                    <td>{{ date('j F, Y - h:m A', strtotime($profesor->created_at)) }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
