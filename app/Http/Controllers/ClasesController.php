<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateClaseRequest;
use App\Http\Requests\UpdateClaseRequest;
use App\Models\Asignatura;
use App\Models\Clase;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ClasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clases = Clase::all();
        return view('clases.index', compact('clases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignaturas = Asignatura::all();
        $profesores = Profesor::all();
        return view('clases.create', compact('asignaturas', 'profesores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClaseRequest $request)
    {
        $clase = Clase::where([
            ['profesor_id', $request->profesor_id],
            ['hora_inicio', $request->hora_inicio],
            ['hora_fin', $request->hora_fin],
            ['estado', '=', 1]
        ])->get();

        // Validamos si el profesor no tenga un registro activo con la clase seleccionada.
        if (count($clase) != 0) {
            return redirect()->back()->with('message', 'El profesor tiene una clase activa con el mismo horario actualmente. Para poder crear una nueva, debe terminar la clase activa en curso.');
        }

        Clase::create($request->all());
        return redirect()->to('admin/clases')->with('message', 'La clase ha sido creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Clase $clase)
    {
        return view('clases.show', compact('clase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Clase $clase)
    {
        $asignaturas = Asignatura::all();
        $profesores = Profesor::all();
        return view('clases.edit', compact('clase', 'asignaturas', 'profesores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClaseRequest $request, Clase $clase)
    {
        $clase->update($request->all());
        return redirect()->back()->with('message', 'La clase ha sido actualizada exitosamente');
    }

}
