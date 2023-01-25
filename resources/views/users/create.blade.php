@extends('layouts.layout')
@section('title', 'Usuarios')
@section('content')
    <div class="row d-flex align-items-center mb-4">
        <div class="col">
            <a class="btn btn-danger" href="{{ route('admin.users.index') }}">
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
                <div class="card-header fs-5"><i class="fa-solid fa-square-plus text-primary"></i> Crear usuario
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Nombres" name="name">
                                    <label for="" class="form-label">Nombre <b class="text-danger">*</b></label>
                                </div>
                                @error('name')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" placeholder="Correo" name="email">
                                    <label for="" class="form-label">Correo <b class="text-danger">*</b></label>
                                </div>
                                @error('email')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                    <label for="" class="form-label">Contraseña <b class="text-danger">*</b></label>
                                </div>
                                @error('password')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <select name="rol_id" class="form-select">
                                        <option disabled selected>Selecciona un rol</option>
                                        @foreach ($roles as $item)
                                            @if ($item->id != 3)
                                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <label for="" class="form-label">Rol <b class="text-danger">*</b></label>
                                </div>
                                @error('rol_id')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-danger">Ingresar usuario</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
