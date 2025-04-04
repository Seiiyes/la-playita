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
        DB::statement("CREATE VIEW `vw_ventas` AS select concat(`c`.`p_nombre_c`,' ',`c`.`s_nombre_c`,' ',`c`.`p_apellido_c`,' ',`c`.`s_apellido_c`) AS `Cliente`,`p`.`nombre_producto` AS `Producto`,`dv`.`cantidad_ventaP` AS `Cantidad`,`dv`.`subtotal` AS `Subtotal`,`v`.`fecha_v` AS `Fecha_Venta`,`v`.`hora_v` AS `Hora_Venta` from (((`la-playita-v1`.`tbl_clientes` `c` join `la-playita-v1`.`tbl_ventas` `v` on(`c`.`pk_id_clientes` = `v`.`fk_id_clientes`)) join `la-playita-v1`.`detalle_ventas` `dv` on(`v`.`pk_ventas` = `dv`.`fk_ventas`)) join `la-playita-v1`.`tbl_producto` `p` on(`dv`.`fk_producto` = `p`.`pk_id_producto`)) where `c`.`pk_id_clientes` = 16 and `v`.`fecha_v` between '2024-09-01' and '2024-11-28'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vw_ventas`");
    }
};
