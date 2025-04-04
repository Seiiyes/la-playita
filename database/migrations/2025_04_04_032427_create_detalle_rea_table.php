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
        Schema::create('detalle_rea', function (Blueprint $table) {
            $table->integer('fk_id_producto')->index('fk_producto_has_reabastecimiento_producto1_idx');
            $table->integer('fk_id_reabastecimiento')->index('fk_producto_has_reabastecimiento_reabastecimiento1_idx');
            $table->integer('cantidad_reabastecimiento');

            $table->primary(['fk_id_producto', 'fk_id_reabastecimiento']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_rea');
    }
};
