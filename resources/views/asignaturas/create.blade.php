@extends('layouts.layout')
@section('title', 'Asignaturas')
@section('content')
    <div class="row d-flex align-items-center mb-4">
        <div class="col">
            <a class="btn btn-danger" href="{{ route('admin.asignaturas.index') }}">
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
                <div class="card-header fs-5"><i class="fa-solid fa-square-plus text-primary"></i> Crear asignatura
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.asignaturas.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="nombre" name="nombre"
                                        value="{{ old('nombre') }}">
                                    <label for="" class="form-label">Nombre <b class="text-danger">*</b></label>
                                </div>
                                @error('nombre')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <select name="area_id" class="form-select">
                                        <option disabled selected>Selecciona una area</option>
                                        @foreach ($areas as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('area_id') == $item->id ? 'selected' : '' }}>{{ $item->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="" class="form-label">Area <b class="text-danger">*</b></label>
                                </div>
                                @error('area_id')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control" placeholder="creditos" name="creditos"
                                        value="{{ old('creditos') }}">
                                    <label for="" class="form-label">Creditos <b class="text-danger">*</b></label>
                                </div>
                                @error('creditos')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 mb-1">
                                <div class="form-floating">
                                    <select name="tipo_asignatura" class="form-select">
                                        <option disabled selected>Selecciona una opción</option>
                                        <option value="0" {{ old('tipo_asignatura') == 0 ? 'selected' : '' }}>
                                            Electiva
                                        </option>
                                        <option value="1" {{ old('tipo_asignatura') == 1 ? 'selected' : '' }}>
                                            Obligatoria
                                        </option>
                                    </select>
                                    <label for="" class="form-label">
                                        Tipo asignatura <b class="text-danger">*</b>
                                    </label>
                                </div>
                                @error('tipo_asignatura')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="descripcion" class="form-label">
                                    Descripción de la asignatura <b class="text-danger">*</b>
                                </label>
                                <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-danger">Ingresar asignatura</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/asignaturas/ckeditor.js') }}"></script>
@endsection
