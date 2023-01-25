@extends('layouts.layout')
@section('title', 'Estudiantes')
@section('content')
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

    {{-- Si el estudiante esta matriculado y no tiene las asignaturas completas, podra seleccionar las asignaturas disponibles --}}
    @if (count($estudiante) && $estudiante[0]['asignaturas'] == 0)
        @include('semestres.asignaturas')

        {{-- Si el estudiante esta matriculado y ya tiene las asignaturas completas, vamos a mostrar esa informacion --}}
    @elseif($estudiante[0]['asignaturas'] == 1)
        @include('semestres.clases')


        {{-- En caso de que el estudiante no este matriculado --}}
    @else
        <div class="row">
            <div class="col text-center">
                <h1>Parece que no tienes una matricula activa</h1>
            </div>
        </div>
    @endif

@endsection
