<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bodega;

class BodegasSeeder extends Seeder
{
    public function run(): void
    {
        Bodega::create([
            'nombre' => 'Bodega Principal',
            'ubicacion' => 'Edificio Central',
        ]);

        // Si quieres agregar más bodegas:
        Bodega::create([
            'nombre' => 'Bodega Secundaria',
            'ubicacion' => 'Almacén Norte',
        ]);
    }
}
