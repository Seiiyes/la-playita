<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'tbl_categorias'; 

    protected $primaryKey = 'pk_id_categoria'; 

    public $incrementing = false;

    public $timestamps = false; 

    protected $fillable = [
        'pk_id_categoria',
        'categoria',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'fk_id_categoria', 'pk_id_categoria');
    }
}
