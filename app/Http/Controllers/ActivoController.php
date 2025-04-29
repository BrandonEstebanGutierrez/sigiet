<?php

namespace App\Http\Controllers;

use App\Models\Activo;
use Illuminate\Http\Request;

class ActivoController extends Controller
{
    public function index()
    {
        $activos = Activo::all();
        return view('activos.index', compact('activos'));
    }

    public function create()
    {
        return view('activos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:100',
            'marca' => 'nullable|string|max:100',
            'numero_serie' => 'nullable|string|max:100|unique:activos,numero_serie',
            'cantidad' => 'required|integer|min:1',
            'valor_unitario' => 'required|numeric|min:0',
            'estado' => 'required|in:nuevo,usado,en reparación',
        ]);

        $valor_total = $request->cantidad * $request->valor_unitario;

        Activo::create([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'marca' => $request->marca,
            'numero_serie' => $request->numero_serie,
            'cantidad' => $request->cantidad,
            'valor_unitario' => $request->valor_unitario,
            'valor_total' => $valor_total,
            'estado' => $request->estado,
        ]);

        return redirect()->route('activos.index')->with('success', 'Activo creado exitosamente.');
    }

    public function edit(Activo $activo)
    {
        return view('activos.edit', compact('activo'));
    }

    public function update(Request $request, Activo $activo)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:100',
            'marca' => 'nullable|string|max:100',
            'numero_serie' => 'nullable|string|max:100|unique:activos,numero_serie,' . $activo->id,
            'cantidad' => 'required|integer|min:1',
            'valor_unitario' => 'required|numeric|min:0',
            'estado' => 'required|in:nuevo,usado,en reparación',
        ]);

        $valor_total = $request->cantidad * $request->valor_unitario;

        $activo->update([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'marca' => $request->marca,
            'numero_serie' => $request->numero_serie,
            'cantidad' => $request->cantidad,
            'valor_unitario' => $request->valor_unitario,
            'valor_total' => $valor_total,
            'estado' => $request->estado,
        ]);

        return redirect()->route('activos.index')->with('success', 'Activo actualizado exitosamente.');
    }

    public function destroy(Activo $activo)
    {
        $activo->delete();
        return redirect()->route('activos.index')->with('success', 'Activo eliminado exitosamente.');
    }
}
