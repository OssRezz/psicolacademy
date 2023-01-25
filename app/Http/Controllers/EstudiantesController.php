<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEstudianteRequest;
use App\Http\Requests\UpdateEstudianteRequest;
use App\Models\ClaseMatricula;
use App\Models\Estudiante;
use App\Models\User;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEstudianteRequest $request)
    {
        //Cuando creamos el estudiante, a la vez estamos creando una cuenta de usuario
        //la  contrasena es el "DOCUMENTO"
        $request->request->add(['rol_id' => 3]);
        $request->request->add(['name' => $request->nombres . ' ' . $request->apellidos]);
        $request->request->add(['password' => $request->documento]);
        User::create($request->all());
        Estudiante::create($request->all());
        return redirect()->to('admin/estudiantes')->with('message', 'El Estudiante ha sido creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {

        //Clases del estudiante
        $ClaseMatricula = ClaseMatricula::join('matriculas', 'matriculas.id', '=', 'clases_matricula.matricula_id')
            ->join('clases', 'clases.id', '=', 'clases_matricula.clase_id')
            ->join('asignaturas', 'asignaturas.id', '=', 'clases.asignatura_id')
            ->join('profesores', 'profesores.id', '=', 'clases.profesor_id')
            ->join('estudiantes', 'estudiantes.id', '=', 'matriculas.estudiante_id')
            ->select(
                'clases_matricula.*',
                'matriculas.estado',
                'matriculas.semestre',
                'clases.hora_inicio',
                'clases.hora_fin',
                'profesores.nombres as nombre_profesor',
                'profesores.apellidos as apellido_profesor',
                'asignaturas.nombre as nombre_asignatura',
                'asignaturas.creditos as credito_matricula',
            )
            ->where([['estudiantes.email', '=', $estudiante->email]])
            ->get();

        return view('estudiantes.show', compact('estudiante', 'ClaseMatricula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        return view('estudiantes.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstudianteRequest $request, Estudiante $estudiante)
    {
        $estudiante->update($request->all());
        return redirect()->back()->with('message', 'El Estudiante ha sido actualizado con exito');
    }


    /**
     * Reporte de clases matriculads del estudiante
     */
    public function report(Estudiante $estudiante)
    {
        //Clases del estudiante
        $ClaseMatricula = ClaseMatricula::join('matriculas', 'matriculas.id', '=', 'clases_matricula.matricula_id')
            ->join('clases', 'clases.id', '=', 'clases_matricula.clase_id')
            ->join('asignaturas', 'asignaturas.id', '=', 'clases.asignatura_id')
            ->join('profesores', 'profesores.id', '=', 'clases.profesor_id')
            ->join('estudiantes', 'estudiantes.id', '=', 'matriculas.estudiante_id')
            ->select(
                'clases_matricula.*',
                'matriculas.estado',
                'matriculas.semestre',
                'clases.hora_inicio',
                'clases.hora_fin',
                'profesores.nombres as nombre_profesor',
                'profesores.apellidos as apellido_profesor',
                'asignaturas.nombre as nombre_asignatura',
                'asignaturas.creditos as credito_matricula',
            )
            ->where([['estudiantes.email', '=', $estudiante->email]])
            ->get();

        $options = new Options();
        $options->set('defaultFont', 'Helvetica');
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $html = view('estudiantes.report', compact('estudiante', 'ClaseMatricula'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->render();
        return $dompdf->stream("Informacion - " . $estudiante->nombres . ' ' . $estudiante->apellidos);
    }
}
