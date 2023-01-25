<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMatriculaRequest;
use App\Http\Requests\UpdateMatriculaRequest;
use App\Models\Estudiante;
use App\Models\Matricula;

class MatriculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matriculas = Matricula::all();
        return view('matriculas.index', compact('matriculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiantes = Estudiante::all();
        return view('matriculas.create', compact('estudiantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMatriculaRequest $request)
    {
        $matricula = Matricula::where([['estudiante_id', $request->estudiante_id], ['estado', '=', 1]])->get();
        if (count($matricula) != 0) {
            return redirect()->back()->with('message', 'El estudiante ya se encuentra en proceso academico');
        }
        Matricula::create($request->all());
        return redirect()->to('admin/matriculas')->with('message', 'Matricula generada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula)
    {
        return view('matriculas.show', compact('matricula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        $estudiantes = Estudiante::all();
        return view('matriculas.edit', compact('estudiantes', 'matricula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMatriculaRequest $request, Matricula $matricula)
    {
        $matricula->update($request->all());
        return redirect()->back()->with('message', 'Matricula actualizada con exito');
    }
}
