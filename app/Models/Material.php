<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
 
    use HasFactory;

    protected $table = 'materiales';

    protected $fillable = [
        'nombre', 'unidad_medida', 'cantidad', 'valor_unitario', 'valor_total'
    ];

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }
}
