<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo', 'material_id', 'herramienta_id', 'cantidad',
        'bodega_origen_id', 'bodega_destino_id', 'fecha',
        'estado', 'observaciones', 'documento_pdf'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function herramienta()
    {
        return $this->belongsTo(Herramienta::class);
    }

    public function bodegaOrigen()
    {
        return $this->belongsTo(Bodega::class, 'bodega_origen_id');
    }

    public function bodegaDestino()
    {
        return $this->belongsTo(Bodega::class, 'bodega_destino_id');
    }
}
