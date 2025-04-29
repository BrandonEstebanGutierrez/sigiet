<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Material;
use App\Models\Herramienta;
use App\Models\Bodega;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    public function index()
    {
        $movimientos = Movimiento::with(['material', 'herramienta', 'bodegaOrigen', 'bodegaDestino'])->get();
        return view('movimientos.index', compact('movimientos'));
    }

    public function create()
    {
        $materiales = Material::all();
        $herramientas = Herramienta::where('estado_mantenimiento', 'disponible')->get();
        $bodegas = Bodega::all();
        return view('movimientos.create', compact('materiales', 'herramientas', 'bodegas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|in:entrada,salida,devolucion,prestamo,traslado',
            'material_id' => 'nullable|exists:materials,id',
            'herramienta_id' => 'nullable|exists:herramientas,id',
            'cantidad' => 'nullable|numeric|min:1',
            'bodega_origen_id' => 'required|exists:bodegas,id',
            'bodega_destino_id' => 'nullable|exists:bodegas,id',
            'fecha' => 'required|date',
            'observaciones' => 'nullable|string|max:500',
        ]);

        $movimiento = Movimiento::create([
            'tipo' => $request->tipo,
            'material_id' => $request->material_id,
            'herramienta_id' => $request->herramienta_id,
            'cantidad' => $request->cantidad,
            'bodega_origen_id' => $request->bodega_origen_id,
            'bodega_destino_id' => $request->bodega_destino_id,
            'fecha' => $request->fecha,
            'estado' => $request->tipo === 'traslado' ? 'pendiente' : 'confirmado',
            'observaciones' => $request->observaciones,
            'documento_pdf' => null, // Se generará en caso de traslado
        ]);

        // Ajuste de inventario para entradas y salidas de materiales
        if ($request->material_id && $request->cantidad) {
            $material = Material::find($request->material_id);

            if ($request->tipo == 'entrada') {
                $material->cantidad += $request->cantidad;
            } elseif (in_array($request->tipo, ['salida', 'traslado'])) {
                $material->cantidad -= $request->cantidad;
            }
            $material->valor_total = $material->cantidad * $material->valor_unitario;
            $material->save();
        }

        // Ajuste de herramienta en préstamo
        if ($request->herramienta_id) {
            $herramienta = Herramienta::find($request->herramienta_id);

            if ($request->tipo == 'prestamo') {
                $herramienta->update([
                    'estado_mantenimiento' => 'en uso',
                    'fecha_prestamo' => $request->fecha,
                    'empleado_asignado_id' => auth()->id(), // Almacenista que hizo el préstamo
                ]);
            } elseif ($request->tipo == 'devolucion') {
                $herramienta->update([
                    'estado_mantenimiento' => 'disponible',
                    'fecha_devolucion' => $request->fecha,
                    'empleado_asignado_id' => null,
                ]);
            }
        }

        return redirect()->route('movimientos.index')->with('success', 'Movimiento registrado exitosamente.');
    }

    public function edit(Movimiento $movimiento)
    {
        return view('movimientos.edit', compact('movimiento'));
    }

    public function update(Request $request, Movimiento $movimiento)
    {
        // Por ahora, solo permitimos cambiar el estado de un traslado pendiente
        if ($movimiento->tipo === 'traslado' && $movimiento->estado === 'pendiente') {
            $movimiento->update(['estado' => 'confirmado']);
            return redirect()->route('movimientos.index')->with('success', 'Traslado confirmado exitosamente.');
        }

        return redirect()->route('movimientos.index')->with('error', 'No se puede modificar este movimiento.');
    }

    public function destroy(Movimiento $movimiento)
    {
        $movimiento->delete();
        return redirect()->route('movimientos.index')->with('success', 'Movimiento eliminado exitosamente.');
    }
}
