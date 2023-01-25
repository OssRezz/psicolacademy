<div class="row mb-4">
    <div class="fs-4"> {{ Auth::user()->name }} </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header  fs-5">
                <i class="fa-solid fa-chalkboard text-primary"></i> Lista de clases
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-stripped table-bordered table-sm" id="TableClases"
                        style="width: 100%">
                        <thead>
                            <tr>
                                <th class="text-start">Asignatura</th>
                                <th class="text-start">Profesor</th>
                                <th class="text-center">Hora inicio</th>
                                <th class="text-center">Hora fin</th>
                                <th class="text-end">Creditos</th>
                                <th class="text-end">Semestre</th>
                                <th class="text-center">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ClaseMatricula as $item)
                                <tr>
                                    <td class="text-start">{{ $item->nombre_asignatura }}</td>
                                    <td lass="text-start">
                                        {{ $item->nombre_profesor . ' ' . $item->apellido_profesor }}</td>
                                    <td class="text-center">{{ $item->hora_inicio }}</td>
                                    <td class="text-center">{{ $item->hora_fin }}</td>
                                    <td class="text-end">{{ $item->credito_matricula }}</td>
                                    <td class="text-end">{{ $item->semestre }}</td>
                                    <td class="text-center">
                                        <div class="badge bg-{{ $item->estado == 1 ? 'success' : 'primary' }}">
                                            {{ $item->estado == 1 ? 'En proceso' : 'Finalizado' }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/semestres/datatable.js') }}"></script>
