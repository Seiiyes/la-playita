<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'tbl_producto'; 
    protected $primaryKey = 'pk_id_producto'; 
    public $incrementing = false; 
    protected $keyType = 'int'; 
    public $timestamps = false;

    protected $fillable = [
        'nombre_producto', 'precio_unitario', 'IVA', 'cantidad_stock', 'fcaducidad', 'descripcion', 'fk_id_categoria'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'fk_id_categoria', 'pk_id_categoria');
    }
}
