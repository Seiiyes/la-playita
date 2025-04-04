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
        DB::statement("CREATE VIEW `vw_producto` AS select `p`.`nombre_producto` AS `Producto`,month(`v`.`fecha_v`) AS `Mes`,sum(`v`.`total`) AS `Total_Ventas` from (((`la-playita-v1`.`tbl_ventas` `v` join `la-playita-v1`.`tbl_usuario` `u` on(`v`.`fk_id_usuario` = `u`.`pk_id_usuario`)) join `la-playita-v1`.`detalle_ventas` `dv` on(`v`.`pk_ventas` = `dv`.`fk_ventas`)) join `la-playita-v1`.`tbl_producto` `p` on(`dv`.`fk_producto` = `p`.`pk_id_producto`)) group by `p`.`nombre_producto`,month(`v`.`fecha_v`) order by sum(`v`.`total`) desc,month(`v`.`fecha_v`),`p`.`nombre_producto`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vw_producto`");
    }
};
