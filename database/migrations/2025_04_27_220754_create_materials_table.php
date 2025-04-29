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
    Schema::create('materiales', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('unidad_medida');
        $table->integer('cantidad');
        $table->decimal('valor_unitario', 10, 2);
        $table->decimal('valor_total', 10, 2);
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
