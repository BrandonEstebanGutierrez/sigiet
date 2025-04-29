<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use App\Models\Bodega;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsuarioRequest;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::with('rol', 'bodega')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = Rol::all();
        $bodegas = Bodega::all();
        return view('usuarios.create', compact('roles', 'bodegas'));
    }

    public function store(UsuarioRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit(User $usuario)
    {
        $roles = Rol::all();
        $bodegas = Bodega::all();
        return view('usuarios.edit', compact('usuario', 'roles', 'bodegas'));
    }

    public function update(UsuarioRequest $request, User $usuario)
    {
        $data = $request->validated();

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']); // No actualizamos la contraseña si está vacía
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
