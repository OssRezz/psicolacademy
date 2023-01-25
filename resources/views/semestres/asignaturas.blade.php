<div class="row">
    <div class="col-12 col-lg-7 col-xl-8 mb-4">
        <div class="card shadow-sm">
            <div class="card-header fs-5">
                <i class="fa-solid fa-book text-primary"></i> Asignaturas disponibles
            </div>
            <div class="card-body">
                <div class="spinner" id="spinner" style="display: none;">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
                <div class="accordion" id="ListaAsignaturas">
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-5 col-xl-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 border-bottom fs-5 pb-3">
                        <i class="fa-solid fa-graduation-cap text-primary"></i> <b>Estudiante</b>
                    </div>
                    <div class="col-12 my-3">
                        Matricula # <b id="creditos_estudiante">{{ $estudiante[0]['id'] }}</b>
                    </div>
                    <div class="col-12 mb-3">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="col-12 mb-3">
                        Documento: {{ $estudiante[0]['documento'] }}
                        <input type="hidden" id="matricula_id" value="{{ $estudiante[0]['id'] }}">
                    </div>
                    <div class="col-12 mb-3 pb-3 border-bottom">
                        Email: {{ Auth::user()->email }}
                    </div>
                    <div class="col-12 mb-1">
                        <label for=""><b>Asignaturas seleccionadas</b>:</label>
                    </div>
                    <div class="col-12 mb-3">
                        <ul class="list-group" id="ListaSeleccionadas">
                            <li class="list-group-item">No ha seleccionado ninguna asignatura</li>
                        </ul>
                    </div>
                    <div class="col-12 my-3">
                        Créditos seleccionados: <b id="creditos_seleccionados">N/A</b>
                    </div>
                    <div class="col-12 my-3 d-grid">
                        <button class="btn btn-primary" onclick="IngresarClases()">Registrar asignaturas</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/semestres/asignaturas.js') }}"></script>
