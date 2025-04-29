<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bodega;
use App\Models\Movimiento;
use App\Models\Material;
use App\Models\Herramienta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $rol = $user->rol->nombre; // Administrador, Gerente, Almacenista, Auditor

        $data = [];

        if ($rol === 'Administrador' || $rol === 'Auditor') {
            // Inventario general
            $data['materiales'] = Material::count();
            $data['herramientas'] = Herramienta::count();
            $data['bodegas'] = Bodega::count();
            $data['movimientos'] = Movimiento::count();
        }

        if ($rol === 'Gerente') {
            // Bodega con más egresos
            $data['bodega_top'] = Movimiento::select('bodegas.nombre', DB::raw('SUM(movimientos.cantidad) as total'))
                ->join('bodegas', 'movimientos.bodega_origen_id', '=', 'bodegas.id')
                ->where('movimientos.tipo', 'salida')
                ->groupBy('bodegas.nombre')
                ->orderByDesc('total')
                ->first();

            // Top 10 materiales más gastados
            $data['top_materiales'] = Movimiento::select('materiales.nombre', DB::raw('SUM(movimientos.cantidad) as cantidad'))
                ->join('materiales', 'movimientos.material_id', '=', 'materiales.id')
                ->where('movimientos.tipo', 'salida')
                ->groupBy('materiales.nombre')
                ->orderByDesc('cantidad')
                ->limit(10)
                ->get();
        }

        if ($rol === 'Almacenista') {
            $bodega_id = $user->bodega_id;
            $data['materiales'] = Material::where('bodega_id', $bodega_id)->count(); // filtra por bodega
            $data['herramientas'] = Herramienta::where('bodega_id', $bodega_id)->count();
            $data['movimientos'] = Movimiento::where('bodega_origen_id', $bodega_id)
                                              ->orWhere('bodega_destino_id', $bodega_id)
                                              ->count();
        }
        
        
        return view('dashboard.index', compact('rol', 'data'));
    }
}
