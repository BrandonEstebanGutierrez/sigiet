<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Principal',
            'email' => 'admin@sigiet.com',
            'password' => Hash::make('password'), // Puedes cambiar la contraseña
            'rol_id' => 1, // Administrador
            'bodega_id' => 1, // Bodega Principal
        ]);

        User::create([
            'name' => 'Gerente General',
            'email' => 'gerente@sigiet.com',
            'password' => Hash::make('password'),
            'rol_id' => 2, // Gerente
            'bodega_id' => null,
        ]);

        User::create([
            'name' => 'Almacenista Uno',
            'email' => 'almacenista@sigiet.com',
            'password' => Hash::make('password'),
            'rol_id' => 3, // Almacenista
            'bodega_id' => 1,
        ]);

        User::create([
            'name' => 'Auditor Uno',
            'email' => 'auditor@sigiet.com',
            'password' => Hash::make('password'),
            'rol_id' => 4, // Auditor
            'bodega_id' => null,
        ]);
    }
}
