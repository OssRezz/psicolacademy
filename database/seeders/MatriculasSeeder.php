<?php

namespace Database\Seeders;

use App\Models\Matricula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatriculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matriculas = [
            [
                "id" => 1,
                "estudiante_id" => 1,
                "creditos_minimos" => 7,
                "creditos" => 0,
                "semestre" => "1",
                "estado" => 1,
                "asignaturas" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 2,
                "estudiante_id" => 2,
                "creditos_minimos" => 7,
                "creditos" => 0,
                "semestre" => "2",
                "estado" => 1,
                "asignaturas" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 3,
                "estudiante_id" => 3,
                "creditos_minimos" => 7,
                "creditos" => 0,
                "semestre" => "3",
                "estado" => 1,
                "asignaturas" => 0,
                "created_at" => now(),
                "updated_at" => now()
            ]
        ];
        Matricula::insert($matriculas);
    }
}
