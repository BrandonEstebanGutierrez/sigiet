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
    Schema::table('materiales', function (Blueprint $table) {
        $table->foreignId('bodega_id')->constrained('bodegas')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('materiales', function (Blueprint $table) {
        $table->dropForeign(['bodega_id']);
        $table->dropColumn('bodega_id');
    });
}

};
