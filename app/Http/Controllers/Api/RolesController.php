<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        return response()->json([
            "status" => 200,
            "message" => "Todas las matriculas",
            "data" => Rol::where('id', '<>', 3)->get()
        ]);
    }
}
