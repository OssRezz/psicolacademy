<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Profesor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(AreasSeeder::class);
        $this->call(ProfesoresSeeder::class);
        $this->call(AsignaturasSeeder::class);
        $this->call(EstudiantesSeeder::class);
        $this->call(ClasesSeeder::class);
        $this->call(MatriculasSeeder::class);
    }
}
