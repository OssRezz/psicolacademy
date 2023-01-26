<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateUsuarioRequest;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            "status" => 200,
            "message" => "Todos los usuarios",
            "data" =>  User::with('rol')->orderByDesc('id')->get()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUsuarioRequest $request)
    {
        if (!Rol::find($request->rol_id)) {
            return response()->json([
                "status" => 204,
                "message" => "El id del rol no se encuentra registrado",
                "data" =>   $request->all()
            ]);
        }
        return response()->json([
            "status" => 200,
            "message" => "Usuario registrado exitosamente",
            "data" =>  User::create($request->all())
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            "status" => 200,
            "message" => "Ver un usuario",
            "data" =>  User::find($id)
        ]);
    }
}
