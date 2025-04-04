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
        Schema::table('tbl_usuario', function (Blueprint $table) {
            $table->foreign(['fk_id_roles'], 'fk_usuario_roles1')->references(['pk_id_roles'])->on('tbl_roles')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_usuario', function (Blueprint $table) {
            $table->dropForeign('fk_usuario_roles1');
        });
    }
};
