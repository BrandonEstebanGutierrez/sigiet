<?php

namespace App\Http\Controllers;

use App\Models\Herramienta;
use App\Models\User;
use Illuminate\Http\Request;

class HerramientaController extends Controller
{
    public function index()
    {
        $herramientas = Herramienta::all();
        return view('herramientas.index', compact('herramientas'));
    }

    public function create()
    {
        return view('herramientas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|in:ligera,pesada',
            'descripcion' => 'nullable|string|max:500',
            'estado_mantenimiento' => 'required|in:disponible,en uso,dañada',
        ]);

        Herramienta::create([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'descripcion' => $request->descripcion,
            'estado_mantenimiento' => $request->estado_mantenimiento,
            'empleado_asignado_id' => null,
            'fecha_prestamo' => null,
            'fecha_devolucion' => null,
        ]);

        return redirect()->route('herramientas.index')->with('success', 'Herramienta creada exitosamente.');
    }

    public function edit(Herramienta $herramienta)
    {
        $empleados = User::all();
        return view('herramientas.edit', compact('herramienta', 'empleados'));
    }

    public function update(Request $request, Herramienta $herramienta)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|in:ligera,pesada',
            'descripcion' => 'nullable|string|max:500',
            'estado_mantenimiento' => 'required|in:disponible,en uso,dañada',
            'empleado_asignado_id' => 'nullable|exists:users,id',
            'fecha_prestamo' => 'nullable|date',
            'fecha_devolucion' => 'nullable|date|after_or_equal:fecha_prestamo',
        ]);

        $herramienta->update([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'descripcion' => $request->descripcion,
            'estado_mantenimiento' => $request->estado_mantenimiento,
            'empleado_asignado_id' => $request->empleado_asignado_id,
            'fecha_prestamo' => $request->fecha_prestamo,
            'fecha_devolucion' => $request->fecha_devolucion,
        ]);

        return redirect()->route('herramientas.index')->with('success', 'Herramienta actualizada exitosamente.');
    }

    public function destroy(Herramienta $herramienta)
    {
        $herramienta->delete();
        return redirect()->route('herramientas.index')->with('success', 'Herramienta eliminada exitosamente.');
    }

    public function marcarDaniada(Herramienta $herramienta)
    {
        $herramienta->update([
            'estado_mantenimiento' => 'dañada',
            'empleado_asignado_id' => null,
            'fecha_prestamo' => null,
            'fecha_devolucion' => null,
        ]);

        return redirect()->route('herramientas.index')->with('success', 'Herramienta marcada como dañada.');
    }

    public function marcarDisponible(Herramienta $herramienta)
    {
        $herramienta->update([
            'estado_mantenimiento' => 'disponible',
            'empleado_asignado_id' => null,
            'fecha_prestamo' => null,
            'fecha_devolucion' => now(),
        ]);

        return redirect()->route('herramientas.index')->with('success', 'Herramienta marcada como disponible.');
    }
}
