<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BodegaController;
use App\Http\Controllers\ActivoController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Protegido por auth
Route::middleware('auth')->group(function () {

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Usuarios (solo Administrador)
    Route::resource('usuarios', UserController::class)->names('usuarios');
    Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UserController::class, 'store'])->name('usuarios.store');

    // Bodegas (Administrador y Gerente)
    Route::resource('bodegas', BodegaController::class)->names('bodegas');

    // Activos (Administrador)
    Route::resource('activos', ActivoController::class)->names('activos');

    // Inventarios (Administrador)
    Route::resource('materiales', MaterialController::class)->names('materiales');

    // Movimientos (Almacenista)
    Route::resource('movimientos', MovimientoController::class)->names('movimientos');

    // Reportes (Gerente y Auditor) - Aquí lo corregimos:
    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
    Route::get('/reportes/material', [ReporteController::class, 'material'])->name('reportes.material');
    Route::get('/reportes/egresos', [ReporteController::class, 'egresos'])->name('reportes.egresos');
    Route::get('/reportes/top-materiales', [ReporteController::class, 'topMateriales'])->name('reportes.top-materiales');
    Route::get('/reportes/prestamos', [ReporteController::class, 'prestamos'])->name('reportes.prestamos');
    Route::get('/reportes/inventario-bodega', [ReporteController::class, 'inventarioPorBodega'])->name('reportes.inventario_por_bodega');


    // Resumen (Gerente y Auditor)
    Route::get('/resumen', [DashboardController::class, 'resumen'])->name('resumen');

    // Mi Bodega (Almacenista)
    Route::get('/mi-bodega', [BodegaController::class, 'miBodega'])->name('mi-bodega');
});

// Rutas de autenticación (login, registro, etc)
require __DIR__.'/auth.php';
