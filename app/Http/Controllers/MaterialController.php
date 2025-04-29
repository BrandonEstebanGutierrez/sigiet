<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materiales = Material::all();
        return view('materiales.index', compact('materiales'));
    }

    public function create()
    {
        return view('materiales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'unidad_medida' => 'required|string|max:50',
            'cantidad' => 'required|numeric|min:0',
            'valor_unitario' => 'required|numeric|min:0',
        ]);

        $valor_total = $request->cantidad * $request->valor_unitario;

        Material::create([
            'nombre' => $request->nombre,
            'unidad_medida' => $request->unidad_medida,
            'cantidad' => $request->cantidad,
            'valor_unitario' => $request->valor_unitario,
            'valor_total' => $valor_total,
        ]);

        return redirect()->route('materiales.index')->with('success', 'Material creado exitosamente.');
    }

    public function edit(Material $material)
    {
        return view('materiales.edit', compact('material'));
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'unidad_medida' => 'required|string|max:50',
            'cantidad' => 'required|numeric|min:0',
            'valor_unitario' => 'required|numeric|min:0',
        ]);

        $valor_total = $request->cantidad * $request->valor_unitario;

        $material->update([
            'nombre' => $request->nombre,
            'unidad_medida' => $request->unidad_medida,
            'cantidad' => $request->cantidad,
            'valor_unitario' => $request->valor_unitario,
            'valor_total' => $valor_total,
        ]);

        return redirect()->route('materiales.index')->with('success', 'Material actualizado exitosamente.');
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('materiales.index')->with('success', 'Material eliminado exitosamente.');
    }
}
