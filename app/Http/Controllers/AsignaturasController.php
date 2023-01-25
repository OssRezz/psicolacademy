<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAsignaturaRequest;
use App\Http\Requests\UpdateAsignaturaRequest;
use App\Models\Area;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaturas = Asignatura::with('area')->get();
        return view('asignaturas.index', compact('asignaturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return view('asignaturas.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAsignaturaRequest $request)
    {
        Asignatura::create($request->all());
        return redirect()->to('admin/asignaturas')->with('message', 'La  asignatura ha sido creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        return view('asignaturas.show', compact('asignatura', 'asignatura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        $areas = Area::all();
        return view('asignaturas.edit', compact('asignatura', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAsignaturaRequest $request, Asignatura $asignatura)
    {
        $asignatura->update($request->all());
        return redirect()->back()->with('message', 'La asignatura ha sido actualizada con exito');
    }

}
