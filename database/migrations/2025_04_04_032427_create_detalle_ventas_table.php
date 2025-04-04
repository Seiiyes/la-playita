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
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->integer('fk_producto')->index('fk_producto_has_ventas_producto1_idx');
            $table->integer('fk_ventas')->index('fk_producto_has_ventas_ventas1_idx');
            $table->integer('cantidad_ventaP');
            $table->decimal('subtotal', 10, 0);

            $table->primary(['fk_producto', 'fk_ventas']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
