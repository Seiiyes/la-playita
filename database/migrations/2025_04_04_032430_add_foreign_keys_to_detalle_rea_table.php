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
        Schema::table('detalle_rea', function (Blueprint $table) {
            $table->foreign(['fk_id_producto'], 'fk_producto_has_reabastecimiento_producto1')->references(['pk_id_producto'])->on('tbl_producto')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['fk_id_reabastecimiento'], 'fk_producto_has_reabastecimiento_reabastecimiento1')->references(['pk_id_reabastecimiento'])->on('tbl_reabastecimiento')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detalle_rea', function (Blueprint $table) {
            $table->dropForeign('fk_producto_has_reabastecimiento_producto1');
            $table->dropForeign('fk_producto_has_reabastecimiento_reabastecimiento1');
        });
    }
};
