<?php

namespace App\Models;

// imports
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'name',
        'email',
        'password',
        'rol_id',
        'bodega_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relaciones

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function bodega()
    {
        return $this->belongsTo(Bodega::class);
    }

    public function herramientasAsignadas()
    {
        return $this->hasMany(Herramienta::class, 'empleado_asignado_id');
    }

    // Función de permisos (middleware personalizado)
    public function hasPermission($permission)
    {
        return $this->rol
                    ->permisos()
                    ->where('nombre', $permission)
                    ->exists();
    }
}
