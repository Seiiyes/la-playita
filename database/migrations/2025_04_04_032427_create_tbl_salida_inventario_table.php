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
        Schema::create('tbl_salida_inventario', function (Blueprint $table) {
            $table->integer('pk_id:_salida');
            $table->integer('fk_id_producto')->index('fk_tbl_salida_inventario_tbl_producto1_idx');
            $table->integer('cantidad_s');
            $table->date('fecha_s');
            $table->time('hora_s');
            $table->string('Motivo', 300);

            $table->primary(['pk_id:_salida', 'fk_id_producto']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_salida_inventario');
    }
};
