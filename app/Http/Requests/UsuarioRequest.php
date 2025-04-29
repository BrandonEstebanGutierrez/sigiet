<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    public function authorize()
    {
        // Permitimos que cualquier usuario autenticado haga la solicitud
        return true;
    }

    public function rules()
    {
        // Aquí van las reglas de validación
        $usuarioId = $this->route('usuario') ? $this->route('usuario')->id : null;

        return [
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuarios,email,' . $usuarioId,
            'password' => $usuarioId ? 'nullable|min:8|confirmed' : 'required|min:8|confirmed',
            'rol_id' => 'required|exists:roles,id',
            'bodega_id' => 'nullable|exists:bodegas,id',
        ];
    }

    public function messages()
    {
        // Mensajes personalizados
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debes ingresar un correo válido.',
            'email.unique' => 'Este correo ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'rol_id.required' => 'Debe seleccionar un rol.',
            'rol_id.exists' => 'El rol seleccionado no existe.',
        ];
    }
}
