<?php

namespace Database\Seeders;

use App\Models\Asignatura;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsignaturasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asignaturas = [
            [
                "id" => 1,
                "area_id" => 1,
                "nombre" => "Bases de Datos",
                "descripcion" => "Bases de Datos (en lo sucesivo BBDD) es una asignatura obligatoria que consta de 6 créditos y que introducirá al estudiante en las áreas fundamentales de esta materia. Las BBDD son colecciones de datos de cualquier tipo pertenecientes a un mismo contexto y almacenados sistemáticamente para su uso posterior. En este sentido, son de vital importancia para el almacenamiento de grandes cantidades de datos, así como para su rápida y flexible recuperación. Por lo tanto, forman parte de una de las ramas con más aplicación de la informática, estando presentes en la industria, la banca, centros de investigación y en cualquier empresa o institución que requiera la organización y gestión de sus datos de manera eficiente. Una vez terminada la asignatura de BBDD los estudiantes serán capaces tanto de diseñar y desarrollar un modelo de base de datos así como de manejar las BBDD a través de lenguajes de consulta",
                "creditos" => "6",
                "tipo_asignatura" => "0",
                "estado" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id" => 2,
                "area_id" => 1,
                "nombre" => "Estructuras de Datos",
                "descripcion" => "La metodología adoptada en esta asignatura para el aprendizaje y evaluación de sus contenidos, se encuentra adecuada a la modalidad de enseñanza a distancia. Junto con el estudio del manual de la asignatura, se encuentran programadas una serie de actividades didácticas evaluables para cada una de las unidades didácticas. Estas actividades consistirán, básicamente, en la búsqueda y análisis de información de fuentes diversas, participación en foros de discusión temáticos, así como la resolución de casos concretos de creación y edición de bases de datos.",
                "creditos" => "10",
                "tipo_asignatura" => "1",
                "estado" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ]
        ];

        Asignatura::insert($asignaturas);
    }
}
