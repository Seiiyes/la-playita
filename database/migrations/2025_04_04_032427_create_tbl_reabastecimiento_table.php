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
        Schema::create('tbl_reabastecimiento', function (Blueprint $table) {
            $table->integer('pk_id_reabastecimiento')->primary();
            $table->date('fecha');
            $table->time('hora');
            $table->decimal('costo', 10, 0);
            $table->integer('fk_id_proveedores')->index('fk_reabastecimiento_proveedores1_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_reabastecimiento');
    }
};
