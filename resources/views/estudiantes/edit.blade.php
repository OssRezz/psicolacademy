@extends('layouts.layout')
@section('title', 'Estudiantes')
@section('content')
    <div class="row d-flex align-items-center mb-4">
        <div class="col">
            <a class="btn btn-danger" href="{{ route('admin.estudiantes.index') }}">
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
                <div class="card-header fs-5"><i class="fa-solid fa-edit text-primary"></i> Editar estudiante
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.estudiantes.update', $estudiante->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="documento" name="documento"
                                        value="{{ $estudiante->documento }}">
                                    <label for="" class="form-label">Documento <b class="text-danger">*</b></label>
                                </div>
                                @error('documento')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Nombres" name="nombres"
                                        value="{{ $estudiante->nombres }}">
                                    <label for="" class="form-label">Nombres <b class="text-danger">*</b></label>
                                </div>
                                @error('nombres')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Nombres" name="apellidos"
                                        value="{{ $estudiante->apellidos }}">
                                    <label for="" class="form-label">Apellidos <b class="text-danger">*</b></label>
                                </div>
                                @error('apellidos')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control" placeholder="telefono" name="telefono"
                                        value="{{ $estudiante->telefono }}">
                                    <label for="" class="form-label">Telefono <b class="text-danger">*</b></label>
                                </div>
                                @error('telefono')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" placeholder="Correo" name="email"
                                        value="{{ $estudiante->email }}">
                                    <label for="" class="form-label">Correo <b class="text-danger">*</b></label>
                                </div>
                                @error('email')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="direccion" placeholder="direccion">{{ $estudiante->direccion }}</textarea>
                                    <label for="" class="form-label">Dirección <b class="text-danger">*</b></label>
                                </div>
                                @error('direccion')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Departamento"
                                        name="departamento" value="{{ $estudiante->departamento }}">
                                    <label for="" class="form-label">Departamento <b class="text-danger">*</b>
                                    </label>
                                </div>
                                @error('departamento')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="ciudad" name="ciudad"
                                        value="{{ $estudiante->ciudad }}">
                                    <label for="" class="form-label">Ciudad <b class="text-danger">*</b>
                                    </label>
                                </div>
                                @error('ciudad')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <select name="estado" class="form-select">
                                        <option value="0" {{ $estudiante->estado == 0 ? 'selected' : '' }}>Inactivo
                                        </option>
                                        <option value="1" {{ $estudiante->estado == 1 ? 'selected' : '' }}>Activo
                                        </option>
                                    </select>
                                    <label for="" class="form-label">Estado <b class="text-danger">*</b></label>
                                </div>
                                @error('estado')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-danger">Actualizar estudiante</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
