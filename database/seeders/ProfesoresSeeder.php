<?php

namespace Database\Seeders;

use App\Models\Profesor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfesoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profesores = [
            [
                "documento" => "1002634684",
                "nombres" => "FRANCISCO",
                "apellidos" => "LOPEZ SANCHEZ",
                "telefono" => "10369572145",
                "email" => "profesor1@gmail.com",
                "direccion" => "asdas",
                "departamento" => "Medellin",
                "ciudad" => "Antioquia",
                "estado" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "documento" => "24335463",
                "nombres" => "MARIA LUISA",
                "apellidos" => "FERNANDEZ RUIZ",
                "telefono" => "10369572145",
                "email" => "profesor2@gmail.com",
                "direccion" => "asdas",
                "departamento" => "Medellin",
                "ciudad" => "Antioquia",
                "estado" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "documento" => "1053806651",
                "nombres" => "ADRIAN",
                "apellidos" => "MOYA NUNEZ",
                "telefono" => "3117562435",
                "email" => "profesor3@gmail.com",
                "direccion" => "Rionegro, Antioquia",
                "departamento" => "Rionegro",
                "ciudad" => "Medellin",
                "estado" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ]
        ];

        Profesor::insert($profesores);
    }
}
