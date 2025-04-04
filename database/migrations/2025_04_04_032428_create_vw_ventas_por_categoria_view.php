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
        DB::statement("CREATE VIEW `vw_ventas_por_categoria` AS select `c`.`categoria` AS `categoria`,sum(`dv`.`subtotal`) AS `total_ventas` from (((`la-playita-v1`.`tbl_categorias` `c` join `la-playita-v1`.`tbl_producto` `p` on(`c`.`pk_id_categoria` = `p`.`fk_id_categoria`)) join `la-playita-v1`.`detalle_ventas` `dv` on(`p`.`pk_id_producto` = `dv`.`fk_producto`)) join `la-playita-v1`.`tbl_ventas` `v` on(`dv`.`fk_ventas` = `v`.`pk_ventas`)) where `v`.`fecha_v` between '2024-09-01' and '2024-11-28' group by `c`.`categoria`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vw_ventas_por_categoria`");
    }
};
