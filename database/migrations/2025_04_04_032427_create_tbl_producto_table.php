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
            $table->integer('pk_id_producto')->primary(); // Quitar si debe ser autoincremental
            // $table->id('pk_id_producto'); // Usar si es autoincremental
            
            $table->string('nombre_producto', 30);
            $table->decimal('precio_unitario', 10, 2); // Se recomienda precisión decimal
            $table->decimal('IVA', 5, 2); // Mejor precisión
            $table->integer('cantidad_stock');
            $table->date('fcaducidad');
            $table->string('descripcion', 50);
            
            // Definir clave foránea correctamente
            $table->integer('fk_id_categoria')->index();
            $table->foreign('fk_id_categoria')
                  ->references('pk_id_categoria')
                  ->on('tbl_categorias')
                  ->onDelete('cascade'); // Elimina productos si se borra la categoría
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
