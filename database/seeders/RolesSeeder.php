<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => 1,
                'nombre' => 'Administrador'
            ],
            [
                'id' => 2,
                'nombre' => 'Usuario'
            ],
            [
                'id' => 3,
                'nombre' => 'Estudiante'
            ],
        ];
        Rol::insert($roles);
    }
}
