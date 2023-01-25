<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'            => 'Administrador',
                'email'              => 'Administrador@gmail.com',
                'email_verified_at'  => now(),
                'password'           => bcrypt('1234'),
                'rol_id'             => '1',
                'remember_token'     => null,
                'created_at'         => now(),
                'updated_at'         => now(),
            ],
            [
                'name'            => 'Usuario',
                'email'              => 'Usuario@gmail.com',
                'email_verified_at'  => now(),
                'password'           => bcrypt('1234'),
                'rol_id'             => '2',
                'remember_token'     => null,
                'created_at'         => now(),
                'updated_at'         => now(),
            ],
            [
                'name'            => 'JOSEFA LOPEZ SANCHEZ',
                'email'              => 'estudiante1@gmail.com',
                'email_verified_at'  => now(),
                'password'           => bcrypt('1234'),
                'rol_id'             => '3',
                'remember_token'     => null,
                'created_at'         => now(),
                'updated_at'         => now(),
            ],
            [
                'name'            => 'DAVID FERNANDEZ RUIZ',
                'email'              => 'estudiante2@gmail.com',
                'email_verified_at'  => now(),
                'password'           => bcrypt('1234'),
                'rol_id'             => '3',
                'remember_token'     => null,
                'created_at'         => now(),
                'updated_at'         => now(),
            ],
            [
                'name'            => 'SOFIA MOYA NUNEZ',
                'email'              => 'estudiante3@gmail.com',
                'email_verified_at'  => now(),
                'password'           => bcrypt('1234'),
                'rol_id'             => '3',
                'remember_token'     => null,
                'created_at'         => now(),
                'updated_at'         => now(),
            ],
        ];

        User::insert($users);
    }
}
