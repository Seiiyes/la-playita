<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE VIEW `vw_inventario` AS select `p`.`nombre_producto` AS `Producto`,`c`.`categoria` AS `Categoría`,`p`.`cantidad_stock` AS `Stock_Actual`,`pr`.`p_nombre_p` AS `Proveedor`,`pr`.`telefono_p` AS `Teléfono_Proveedor`,max(`r`.`fecha`) AS `Ultimo_Reabastecimiento` from ((((`la-playita-v1`.`tbl_producto` `p` join `la-playita-v1`.`tbl_categorias` `c` on(`p`.`fk_id_categoria` = `c`.`pk_id_categoria`)) left join `la-playita-v1`.`detalle_rea` `dr` on(`p`.`pk_id_producto` = `dr`.`fk_id_producto`)) left join `la-playita-v1`.`tbl_reabastecimiento` `r` on(`dr`.`fk_id_reabastecimiento` = `r`.`pk_id_reabastecimiento`)) left join `la-playita-v1`.`tbl_proveedores` `pr` on(`r`.`fk_id_proveedores` = `pr`.`pk_id_proveedores`)) where `p`.`cantidad_stock` <= 25 group by `p`.`nombre_producto`,`c`.`categoria`,`p`.`cantidad_stock`,`pr`.`p_nombre_p`,`pr`.`telefono_p`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vw_inventario`");
    }
};
