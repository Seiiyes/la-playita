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
        Schema::table('tbl_ventas', function (Blueprint $table) {
            $table->foreign(['fk_id_usuario'], 'fk_tbl_ventas_tbl_usuario1')->references(['pk_id_usuario'])->on('tbl_usuario')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['fk_id_clientes'], 'fk_ventas_clientes1')->references(['pk_id_clientes'])->on('tbl_clientes')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_ventas', function (Blueprint $table) {
            $table->dropForeign('fk_tbl_ventas_tbl_usuario1');
            $table->dropForeign('fk_ventas_clientes1');
        });
    }
};
