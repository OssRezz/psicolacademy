<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            [
                'id' => 1,
                'nombre' => 'Ciencias Físico - Matemáticas y de las Ingenierías.'
            ],
            [
                'id' => 2,
                'nombre' => 'Ciencias Biológicas, Químicas y de la Salud.'
            ],
            [
                'id' => 3,
                'nombre' => 'Ciencias Sociales.'
            ],
            [
                'id' => 4,
                'nombre' => 'Humanidades y de las Artes.'
            ],
        ];

        Area::insert($areas);
    }
}
