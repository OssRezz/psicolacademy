@extends('layouts.layout')
@section('title', 'Matriculas')
@section('content')
    <div class="row d-flex align-items-center mb-4">
        <div class="col">
            <a class="btn btn-danger" href="{{ route('admin.matriculas.index') }}">
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
                <div class="card-header fs-5"><i class="fa-solid fa-edit text-primary"></i> Editar Matricula
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.matriculas.update', $matricula->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">

                            <div class="col-12">
                                <div class="form-floating">
                                    <select name="estudiante_id" class="form-select">
                                        <option disabled selected>Selecciona un estudiante</option>
                                        @foreach ($estudiantes as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $matricula->estudiante_id ? 'selected' : '' }}>
                                                {{ $item->nombres . ' ' . $item->apellidos }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="" class="form-label">Estudiante <b class="text-danger">*</b></label>
                                </div>
                                @error('estudiante_id')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 col-xl-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="creditos" name="creditos"
                                        value="{{ $matricula->creditos }}">
                                    <label for="" class="form-label">
                                        Créditos minimos <b class="text-danger">*</b>
                                    </label>
                                </div>
                                @error('creditos')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 col-xl-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" placeholder="semestre" name="semestre"
                                        value="{{ $matricula->semestre }}">
                                    <label for="" class="form-label"># de semestre <b
                                            class="text-danger">*</b></label>
                                </div>
                                @error('semestre')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 col-xl-4">
                                <div class="form-floating">
                                    <select name="estado" class="form-select">
                                        <option value="0" {{ $matricula->estado == 0 ? 'selected' : '' }}>Finalizado
                                        </option>
                                        <option value="1" {{ $matricula->estado == 1 ? 'selected' : '' }}>En proceso
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
                                    <button class="btn btn-danger">Actualizar matricula</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
