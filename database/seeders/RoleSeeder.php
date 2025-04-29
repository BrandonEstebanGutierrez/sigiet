<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Rol::insert([
            ['nombre' => 'Administrador'],
            ['nombre' => 'Gerente'],
            ['nombre' => 'Almacenista'],
            ['nombre' => 'Auditor'],
        ]);
    }
}
