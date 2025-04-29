<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    public function index()
    {
        $bodegas = Bodega::all();
        return view('bodegas.index', compact('bodegas'));
    }

    public function create()
    {
        return view('bodegas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'principal' => 'required|boolean',
        ]);

        // Si ya existe una bodega principal, no se puede crear otra
        if ($request->principal && Bodega::where('principal', true)->exists()) {
            return back()->withErrors(['principal' => 'Ya existe una bodega principal.'])->withInput();
        }

        Bodega::create([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
            'principal' => $request->principal,
        ]);

        return redirect()->route('bodegas.index')->with('success', 'Bodega creada exitosamente.');
    }

    public function edit(Bodega $bodega)
    {
        return view('bodegas.edit', compact('bodega'));
    }

    public function update(Request $request, Bodega $bodega)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'principal' => 'required|boolean',
        ]);

        // Si se intenta poner otra bodega como principal, debe validar
        if ($request->principal && !$bodega->principal && Bodega::where('principal', true)->exists()) {
            return back()->withErrors(['principal' => 'Ya existe una bodega principal.'])->withInput();
        }

        $bodega->update([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
            'principal' => $request->principal,
        ]);

        return redirect()->route('bodegas.index')->with('success', 'Bodega actualizada exitosamente.');
    }

    public function destroy(Bodega $bodega)
    {
        if ($bodega->principal) {
            return redirect()->route('bodegas.index')->with('error', 'La bodega principal no puede ser eliminada.');
        }

        $bodega->delete();
        return redirect()->route('bodegas.index')->with('success', 'Bodega eliminada exitosamente.');
    }
}
