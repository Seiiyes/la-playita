<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'tbl_roles';
    protected $primaryKey = 'pk_id_roles';
    public $timestamps = false;

    protected $fillable = [
        'pk_id_roles',
        'desc_rol'
    ];
    
    public function usuarios()
    {
    return $this->hasMany(Usuario::class, 'fk_id_roles', 'pk_id_roles');
    }

}
