@extends('layouts.layout')
@section('title', 'Profesores')
@section('content')
    <div class="row d-flex align-items-center mb-4">
        <div class="col">
            <a class="btn btn-danger" href="{{ route('admin.profesores.index') }}">
                <i class="fas fa-caret-square-left"></i> Atrás
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
        <div class="col-12 col-lg-7">
            <div class="card">
                <div class="card-header fs-5"><i class="fa-solid fa-square-plus text-primary"></i> Crear profesor
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profesores.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="documento" name="documento"
                                        value="{{ old('documento') }}">
                                    <label for="" class="form-label">Documento <b class="text-danger">*</b></label>
                                </div>
                                @error('documento')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Nombres" name="nombres"
                                        value="{{ old('nombres') }}">
                                    <label for="" class="form-label">Nombres <b class="text-danger">*</b></label>
                                </div>
                                @error('nombres')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Nombres" name="apellidos"
                                        value="{{ old('apellidos') }}">
                                    <label for="" class="form-label">Apellidos <b class="text-danger">*</b></label>
                                </div>
                                @error('apellidos')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control" placeholder="telefono" name="telefono"
                                        value="{{ old('telefono') }}">
                                    <label for="" class="form-label">Telefono <b class="text-danger">*</b></label>
                                </div>
                                @error('telefono')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" placeholder="Correo" name="email"
                                        value="{{ old('email') }}">
                                    <label for="" class="form-label">Correo <b class="text-danger">*</b></label>
                                </div>
                                @error('email')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="direccion" placeholder="direccion">{{ old('direccion') }}</textarea>
                                    <label for="" class="form-label">Dirección <b class="text-danger">*</b></label>
                                </div>
                                @error('direccion')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Departamento"
                                        name="departamento" value="{{ old('departamento') }}">
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
                                        value="{{ old('ciudad') }}">
                                    <label for="" class="form-label">Ciudad <b class="text-danger">*</b>
                                    </label>
                                </div>
                                @error('ciudad')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-danger">Ingresar profesor</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/profesores/ckeditor.js') }}"></script>

@endsection
