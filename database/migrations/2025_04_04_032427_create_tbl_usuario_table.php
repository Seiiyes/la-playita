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
        Schema::create('tbl_usuario', function (Blueprint $table) {
            $table->increments('pk_id_usuario')->primary();
            $table->string('p_nombre_u', 25);
            $table->string('s_nombre_u', 25)->nullable();
            $table->string('p_apellido_u', 25);
            $table->string('s_apellido_u', 25)->nullable();
            $table->string('correo_u', 60);
            $table->string('contrasena', 255);
            $table->tinyInteger('estado_usuario');
            $table->integer('fk_id_roles')->index('fk_usuario_roles1_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_usuario');
    }
};
