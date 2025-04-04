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
        DB::statement("CREATE VIEW `vw_rentabilidad` AS select `p`.`nombre_producto` AS `Producto`,sum(`dv`.`cantidad_ventaP` * `p`.`precio_unitario`) AS `Total_Ventas`,sum(`dv`.`cantidad_ventaP` * (`p`.`precio_unitario` - `r`.`costo` / `p`.`cantidad_stock`)) AS `Ganancia_Total` from ((((`la-playita-v1`.`tbl_producto` `p` join `la-playita-v1`.`detalle_ventas` `dv` on(`p`.`pk_id_producto` = `dv`.`fk_producto`)) join `la-playita-v1`.`tbl_ventas` `v` on(`dv`.`fk_ventas` = `v`.`pk_ventas`)) join `la-playita-v1`.`detalle_rea` `dr` on(`p`.`pk_id_producto` = `dr`.`fk_id_producto`)) join `la-playita-v1`.`tbl_reabastecimiento` `r` on(`dr`.`fk_id_reabastecimiento` = `r`.`pk_id_reabastecimiento`)) where `v`.`fecha_v` between '2024-09-01' and '2024-11-26' group by `p`.`nombre_producto`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vw_rentabilidad`");
    }
};
