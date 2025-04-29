<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'tipo', 'marca', 'numero_serie',
        'cantidad', 'valor_unitario', 'valor_total', 'estado'
    ];
}
