<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'tbl_usuario';
    protected $primaryKey = 'pk_id_usuario';
    public $timestamps = false;

    protected $fillable = [
        'p_nombre_u', 's_nombre_u', 'p_apellido_u', 's_apellido_u',
        'correo_u', 'contrasena', 'estado_usuario', 'fk_id_roles',
    ];

    protected $hidden = ['contrasena'];

    public function getAuthPassword()
    {
        return $this->contrasena;

    }
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'fk_id_roles', 'pk_id_roles');
    }
}
