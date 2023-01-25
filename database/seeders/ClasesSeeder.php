<?php

namespace Database\Seeders;

use App\Models\Clase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clases = [
            [
                "id" => 1,
                "profesor_id" => 1,
                "asignatura_id" => 1,
                "hora_inicio" => "00:00",
                "hora_fin" => "13:00",
                "estado" => "1",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 2,
                "profesor_id" => 1,
                "asignatura_id" => 2,
                "hora_inicio" => "12:45",
                "hora_fin" => "15:48",
                "estado" => "1",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 3,
                "profesor_id" => 2,
                "asignatura_id" => 1,
                "hora_inicio" => "16:49",
                "hora_fin" => "12:45",
                "estado" => "1",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 4,
                "profesor_id" => 3,
                "asignatura_id" => 1,
                "hora_inicio" => "05:51",
                "hora_fin" => "15:49",
                "estado" => "1",
                "created_at" => now(),
                "updated_at" => now()
            ]
        ];

        Clase::insert($clases);
    }
}
