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
    Schema::create('movimientos', function (Blueprint $table) {
        $table->id();
        $table->enum('tipo', ['entrada', 'salida', 'devolución', 'préstamo', 'traslado']);
        $table->foreignId('material_id')->nullable()->constrained('materiales')->nullOnDelete();
        $table->foreignId('herramienta_id')->nullable()->constrained('herramientas')->nullOnDelete();
        $table->integer('cantidad');
        $table->foreignId('bodega_origen_id')->constrained('bodegas')->onDelete('cascade');
        $table->foreignId('bodega_destino_id')->nullable()->constrained('bodegas')->nullOnDelete();
        $table->date('fecha');
        $table->enum('estado', ['pendiente', 'confirmado']);
        $table->text('observaciones')->nullable();
        $table->string('documento_pdf')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
