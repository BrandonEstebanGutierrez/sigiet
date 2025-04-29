<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'ubicacion', 'principal'];

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function movimientosOrigen()
    {
        return $this->hasMany(Movimiento::class, 'bodega_origen_id');
    }

    public function movimientosDestino()
    {
        return $this->hasMany(Movimiento::class, 'bodega_destino_id');
    }
}
