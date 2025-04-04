<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tbl_salida_inventario', function (Blueprint $table) {
            $table->foreign(['fk_id_producto'], 'fk_tbl_salida_inventario_tbl_producto1')->references(['pk_id_producto'])->on('tbl_producto')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_salida_inventario', function (Blueprint $table) {
            $table->dropForeign('fk_tbl_salida_inventario_tbl_producto1');
        });
    }
};
