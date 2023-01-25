@extends('layouts.layout')
@section('title', 'Dashboard')
@section('cdn')
    <script type="text/javascript" src="{{ asset('lib/chartjs/chart.min.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-12  col-lg-4 col-xxl-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body d-flex align-items-center justify-content-center px-4" style="height: 7em;">
                    <div class="col">
                        <i class="fa-solid fa-chalkboard-user fa-3x text-secondary"></i>
                    </div>
                    <div class="col">
                        <div class="col-12 text-end">
                            <h3><b>{{ $estudiantes }}</b></h3>
                        </div>
                        <div class="col-12 text-end">
                            <small><b>Estudiantes</b></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12  col-lg-4 col-xxl-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body d-flex align-items-center justify-content-center px-4" style="height: 7em;">
                    <div class="col">
                        <i class="fa-solid fa-chalkboard fa-3x text-secondary"></i>
                    </div>
                    <div class="col">
                        <div class="col-12 text-end">
                            <h3><b>{{ $clases }}</b></h3>
                        </div>
                        <div class="col-12 text-end">
                            <small><b>Clases activas</b></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12  col-lg-4 col-xxl-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body d-flex align-items-center justify-content-center px-4" style="height: 7em;">
                    <div class="col">
                        <i class="fa-solid fa-receipt fa-3x text-secondary"></i>
                    </div>
                    <div class="col">
                        <div class="col-12 text-end">
                            <h3><b>{{ $matriculas }}</b></h3>
                        </div>
                        <div class="col-12 text-end">
                            <small><b>Matriculas</b></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header"><i class="fa-solid fa-chart-pie text-primary"></i> <b>Asignaturas con mayor numero
                        de
                        matriculas</b>
                </div>
                <div class="card-body chart d-flex justify-content-center">
                    <canvas id="chartDonaAsignaturas" class="d-flex justify-content-center"></canvas>
                </div>
                <div class="card-footer text-center" id="footerAsignatura" style="display: none">
                    <small><b>No hay clases matriculadas</b></small>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header"><i class="fa-solid fa-chart-pie text-primary"></i> <b>Profesores con mayor numero
                        de clases</b>
                </div>
                <div class="card-body chart d-flex justify-content-center">
                    <canvas id="chartDonaProfesor" class="d-flex justify-content-center"></canvas>
                </div>
                <div class="card-footer text-center" id="footerProfesores" style="display: none">
                    <small><b>No hay clases matriculadas</b></small>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/dashboard/chartprofesores.js') }}" defer></script>
    <script src="{{ asset('js/dashboard/chartAsignaturas.js') }}" defer></script>
@endsection
