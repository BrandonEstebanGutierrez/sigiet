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
    Schema::create('activos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('tipo');
        $table->string('marca');
        $table->string('numero_serie')->unique();
        $table->integer('cantidad');
        $table->decimal('valor_unitario', 10, 2);
        $table->decimal('valor_total', 10, 2);
        $table->enum('estado', ['nuevo', 'usado', 'en reparación']);
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activos');
    }
};
