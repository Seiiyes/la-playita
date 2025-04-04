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
        Schema::create('tbl_proveedores', function (Blueprint $table) {
            $table->integer('pk_id_proveedores')->primary();
            $table->string('p_nombre_p', 25);
            $table->string('s_nombre_p', 25)->nullable();
            $table->string('p_apellido_p', 25);
            $table->string('s_apellido_p', 25)->nullable();
            $table->string('telefono_p', 50);
            $table->string('corrreo_p', 50);
            $table->string('direccion_p', 60);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_proveedores');
    }
};
