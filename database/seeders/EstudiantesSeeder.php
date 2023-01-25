<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estudiantes = [
            [
                "documento" => "1234",
                "nombres" => "JOSEFA",
                "apellidos" => "LOPEZ SANCHEZ",
                "telefono" => "10369572145",
                "email" => "estudiante1@gmail.com",
                "direccion" => "asdas",
                "departamento" => "Medellin",
                "ciudad" => "Antioquia",
                "estado" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "documento" => "1234",
                "nombres" => "DAVID",
                "apellidos" => "FERNANDEZ RUIZ",
                "telefono" => "10369572145",
                "email" => "estudiante2@gmail.com",
                "direccion" => "asdas",
                "departamento" => "Medellin",
                "ciudad" => "Antioquia",
                "estado" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "documento" => "1234",
                "nombres" => "SOFIA",
                "apellidos" => "MOYA NUNEZ",
                "telefono" => "3117562435",
                "email" => "estudiante3@gmail.com",
                "direccion" => "Rionegro, Antioquia",
                "departamento" => "Rionegro",
                "ciudad" => "Medellin",
                "estado" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ]
        ];

        Estudiante::insert($estudiantes);
    }
}
