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
        Schema::create('tbl_producto', function (Blueprint $table) {
            $table->integer('pk_id_producto')->primary();
            $table->string('nombre_producto', 30);
            $table->decimal('precio_unitario', 10, 0);
            $table->float('IVA');
            $table->integer('cantidad_stock');
            $table->date('fcaducidad');
            $table->string('descripcion', 50);
            $table->integer('fk_id_categoria')->index('fk_producto_categorias_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_producto');
    }
};
