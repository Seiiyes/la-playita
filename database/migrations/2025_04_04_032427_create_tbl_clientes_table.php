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
        Schema::create('tbl_clientes', function (Blueprint $table) {
            $table->integer('pk_id_clientes')->primary();
            $table->string('p_nombre_c', 25);
            $table->string('s_nombre_c', 25)->nullable();
            $table->string('p_apellido_c', 25);
            $table->string('s_apellido_c', 25)->nullable();
            $table->string('correo_c', 25);
            $table->string('tel_c', 25);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_clientes');
    }
};
