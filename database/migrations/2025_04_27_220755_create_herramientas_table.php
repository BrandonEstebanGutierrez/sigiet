<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('herramientas', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->enum('tipo', ['ligera', 'pesada']);
        $table->text('descripcion');
        $table->enum('estado_mantenimiento', ['en uso', 'disponible', 'dañada']);
        $table->foreignId('empleado_asignado_id')->nullable()->constrained('usuarios')->nullOnDelete();
        $table->date('fecha_prestamo')->nullable();
        $table->date('fecha_devolucion')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('herramientas');
    }
};
