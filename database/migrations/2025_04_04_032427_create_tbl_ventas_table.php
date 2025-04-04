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
        Schema::create('tbl_ventas', function (Blueprint $table) {
            $table->integer('pk_ventas')->primary();
            $table->date('fecha_v');
            $table->time('hora_v');
            $table->decimal('total', 10, 0);
            $table->integer('fk_id_clientes')->index('fk_ventas_clientes1_idx');
            $table->integer('fk_id_usuario')->index('fk_tbl_ventas_tbl_usuario1_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_ventas');
    }
};
