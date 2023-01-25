<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style>
        table {
            width: 100%;
        }

        .fs-5 {
            font-size: 12px;
        }

        .border {
            border: 1px solid;
            border-color: #212529 !important
        }

        .rounded {
            border-radius: .25rem !important
        }

        .mb-1 {
            margin-bottom: .25rem !important
        }

        .mb-3 {
            margin-bottom: 1rem !important
        }

        .mb-4 {
            margin-bottom: 1.5rem !important
        }

        .mb-5 {
            margin-bottom: 2rem !important
        }

        .border-top {
            border-top: 1px solid #212529 !important
        }

        .border-end {
            border-right: 1px solid #212529 !important
        }

        .border-start {
            border-left: 1px solid #212529 !important
        }

        .text-center {
            text-align: center !important
        }

        .p-2 {
            padding: .5rem !important
        }

        .text-start {
            text-align: left !important
        }

        .bg-light {}

        .text-muted {
            color: #6c757d !important
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        @page {
            size: 21cm 29.7cm;
            margin: 15;
        }
    </style>
</head>

<body class="bg-light">
    <table class="mb-5">
        <tr>
            <td align="center" style="font-size: 28px">
                <b>PsicolAcademy</b>
            </td>
        </tr>
    </table>
    <table border="" style="width: 100%" class="mb-4">
        <thead>
            <tr>
                <th align="center">Nombre completo</th>
                <td align="center">{{ $estudiante->nombres }} {{ $estudiante->apellidos }}</td>
            </tr>
            <tr>
                <th align="center">Documento</th>
                <td align="center">{{ $estudiante->documento }}</td>
            </tr>
            <tr>
                <th align="center">Email</th>
                <td align="center">{{ $estudiante->email }}</td>
            </tr>
            <tr>
                <th align="center">Telefono</th>
                <td align="center">{{ $estudiante->telefono }}</td>
            </tr>
            <tr>
                <th align="center">Departamento/Ciudad</th>
                <td align="center">{{ $estudiante->departamento . ' - ' . $estudiante->ciudad }}</td>
            </tr>
            <tr>
                <th align="center">Direccion</th>
                <td align="center">{{ $estudiante->direccion }}</td>
            </tr>
            <tr>
                <th align="center">Estado</th>
                <td align="center">
                    {{ $estudiante->estado == 1 ? 'Activo' : 'Inactivo' }}
                </td>
            </tr>
            <tr>
                <th align="center">Fecha de creación</th>
                <td align="center">{{ date('j F, Y - h:m A', strtotime($estudiante->created_at)) }}</td>
            </tr>
        </thead>
    </table>

    @if (count($ClaseMatricula) != 0)
        <table class="mb-1">
            <th align="start">
                Asignaturas matriculadas
            </th>
        </table>
        <table border="" style="width: 100%">
            <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Semestre</th>
                    <th>Asignatura</th>
                    <th>Profesor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ClaseMatricula as $item)
                    <tr>
                        <td class="border" align="center">#{{ $item->matricula_id }}</td>
                        <td class="border" align="center">{{ $item->semestre }}</td>
                        <td class="border" align="center">{{ $item->nombre_asignatura }}</td>
                        <td class="border" align="center">
                            {{ $item->nombre_profesor . ' ' . $item->apellido_profesor }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3>No tiene clases matriculadas</h3>
    @endif
</body>

</html>
