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
        DB::statement("CREATE VIEW `vw_movimientop` AS select `p`.`nombre_producto` AS `nombre_producto`,`c`.`categoria` AS `categoria` from (((((`la-playita-v1`.`tbl_producto` `p` join `la-playita-v1`.`tbl_categorias` `c` on(`p`.`fk_id_categoria` = `c`.`pk_id_categoria`)) left join `la-playita-v1`.`detalle_ventas` `dv` on(`p`.`pk_id_producto` = `dv`.`fk_producto`)) left join `la-playita-v1`.`tbl_ventas` `v` on(`dv`.`fk_ventas` = `v`.`pk_ventas`)) left join `la-playita-v1`.`detalle_rea` `dr` on(`p`.`pk_id_producto` = `dr`.`fk_id_producto`)) left join `la-playita-v1`.`tbl_reabastecimiento` `r` on(`dr`.`fk_id_reabastecimiento` = `r`.`pk_id_reabastecimiento`)) where (`v`.`fecha_v` < curdate() - interval 2 month or `v`.`fecha_v` is null) and (`r`.`fecha` < curdate() - interval 2 month or `r`.`fecha` is null) group by `p`.`pk_id_producto` having count(`dv`.`fk_producto`) = 0 and count(`dr`.`fk_id_producto`) = 0");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vw_movimientop`");
    }
};
