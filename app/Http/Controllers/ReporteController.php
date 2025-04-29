<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Herramienta;
use App\Models\Movimiento;
use App\Models\Bodega;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    // Muestra el menú principal de reportes
    public function index()
    {
        return view('reportes.index');
    }

    // Reporte de inventario general (materiales + herramientas)
    public function material()
    {
        $materiales = Material::all();
        $herramientas = Herramienta::all();

        return view('reportes.materiales', compact('materiales', 'herramientas'));
    }

    // Reporte de egresos por bodega
    public function egresos()
    {
        $egresos = Movimiento::select('bodegas.nombre as nombre_bodega', DB::raw('SUM(movimientos.cantidad) as total_egresos'))
            ->join('bodegas', 'movimientos.bodega_origen_id', '=', 'bodegas.id')
            ->where('movimientos.tipo', 'salida')
            ->groupBy('bodegas.nombre')
            ->get();

        return view('reportes.egresos', compact('egresos'));
    }

    // Reporte del top 10 materiales más usados
    public function topMateriales()
    {
        $top_materiales = Movimiento::select('materiales.nombre', DB::raw('SUM(movimientos.cantidad) as cantidad_usada'))
            ->join('materiales', 'movimientos.material_id', '=', 'materiales.id')
            ->where('movimientos.tipo', 'salida')
            ->groupBy('materiales.nombre')
            ->orderByDesc('cantidad_usada')
            ->limit(10)
            ->get();

        return view('reportes.top_materiales', compact('top_materiales'));
    }

    // Reporte de préstamos de herramientas
    public function prestamos()
    {
        $prestamos = Herramienta::whereNotNull('empleado_asignado_id')
            ->select('nombre as nombre_herramienta', 'empleado_asignado_id', 'fecha_prestamo', 'fecha_devolucion', 'estado_mantenimiento')
            ->with('empleadoAsignado')
            ->get()
            ->map(function ($herramienta) {
                return (object)[
                    'nombre_herramienta' => $herramienta->nombre_herramienta,
                    'empleado_nombre' => optional($herramienta->empleadoAsignado)->nombre,
                    'fecha_prestamo' => $herramienta->fecha_prestamo,
                    'fecha_devolucion' => $herramienta->fecha_devolucion,
                    'estado_mantenimiento' => $herramienta->estado_mantenimiento,
                ];
            });

        return view('reportes.prestamos', compact('prestamos'));
    }

    public function inventarioPorBodega(Request $request)
{
    $bodegas = Bodega::all();
    $bodega_id = $request->input('bodega_id');

    $materiales = Material::where('bodega_id', $bodega_id)->get();
    $herramientas = Herramienta::where('bodega_id', $bodega_id)->get();

    return view('reportes.inventario_por_bodega', compact('bodegas', 'materiales', 'herramientas', 'bodega_id'));
}

}
