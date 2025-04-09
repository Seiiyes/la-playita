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
            $table->increments('pk_id_producto')->primary(); 
            $table->string('nombre_producto', 30);
            $table->decimal('precio_unitario', 10, 2); 
            $table->decimal('IVA', 5, 2); 
            $table->integer('cantidad_stock');

            $table->date('fcaducidad')->nullable();

            $table->string('descripcion', 50);

            $table->integer('fk_id_categoria')->index();
            $table->foreign('fk_id_categoria')
                  ->references('pk_id_categoria')
                  ->on('tbl_categorias')
                  ->onDelete('cascade'); 
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
