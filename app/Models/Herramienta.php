<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Herramienta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'tipo', 'descripcion', 'estado_mantenimiento',
        'empleado_asignado_id', 'fecha_prestamo', 'fecha_devolucion'
    ];

    public function empleadoAsignado()
    {
        return $this->belongsTo(User::class, 'empleado_asignado_id');
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }
}
