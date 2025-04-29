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
    Schema::table('herramientas', function (Blueprint $table) {
        $table->unsignedBigInteger('bodega_id')->nullable()->after('id'); // o el campo que quieras
        $table->foreign('bodega_id')->references('id')->on('bodegas')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('herramientas', function (Blueprint $table) {
        $table->dropForeign(['bodega_id']);
        $table->dropColumn('bodega_id');
    });
}

};
