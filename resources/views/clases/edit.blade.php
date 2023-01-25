@extends('layouts.layout')
@section('title', 'Clases')
@section('content')
    <div class="row d-flex align-items-center mb-4">
        <div class="col">
            <a class="btn btn-danger" href="{{ route('admin.clases.index') }}">
                <i class="fas fa-caret-square-left"></i> Atrás
            </a>
        </div>
    </div>
    <div class="row mb-0">
        <div class="col-12 col-lg-7">
            @if (session('message'))
                <div class="alert alert-primary alert-dismissible fade show d-flex justify-content-bewteen align-items-center mb-1"
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
        <div class="col-12 col-lg-7">
            <div class="card">
                <div class="card-header fs-5"><i class="fa-solid fa-edit text-primary"></i> Editar clase
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.clases.update', $clase->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">

                            <div class="col-12">
                                <div class="form-floating">
                                    <select name="asignatura_id" class="form-select">
                                        <option disabled selected>Selecciona una asignatura</option>
                                        @foreach ($asignaturas as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $clase->asignatura_id ? 'selected' : '' }}>
                                                {{ $item->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="" class="form-label">Asignatura <b class="text-danger">*</b></label>
                                </div>
                                @error('asignatura_id')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <select name="profesor_id" class="form-select">
                                        <option disabled selected>Selecciona un profesor</option>
                                        @foreach ($profesores as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $clase->profesor_id ? 'selected' : '' }}>
                                                {{ $item->nombres . ' ' . $item->apellidos }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="" class="form-label">Profesor <b class="text-danger">*</b></label>
                                </div>
                                @error('profesor_id')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-floating">
                                    <input type="time" class="form-control" placeholder="hora_inicio" name="hora_inicio"
                                        value="{{ $clase->hora_inicio }}">
                                    <label for="" class="form-label">Hora de inicio <b
                                            class="text-danger">*</b></label>
                                </div>
                                @error('hora_inicio')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-floating">
                                    <input type="time" class="form-control" placeholder="hora_fin" name="hora_fin"
                                        value="{{ $clase->hora_fin }}">
                                    <label for="" class="form-label">Hora de fin <b
                                            class="text-danger">*</b></label>
                                </div>
                                @error('hora_fin')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <select name="estado" class="form-select">
                                        <option value="0" {{ $clase->estado == 0 ? 'selected' : '' }}>Inactivo
                                        </option>
                                        <option value="1" {{ $clase->estado == 1 ? 'selected' : '' }}>Activo
                                        </option>
                                    </select>
                                    <label for="" class="form-label">Estado <b class="text-danger">*</b></label>
                                </div>
                                @error('estado')
                                    <small class="text-latinco">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-danger">Actualizar clase</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
