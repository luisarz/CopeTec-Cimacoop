<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $table = 'empleados';
    public $primaryKey = 'id_empleado';
    use HasFactory;
    //Empleados se relaciona con usuario
    public function usuario()
    {
        return $this->hasOne(User::class, 'id_empleado_usuario');
    }
    public function clientes()
    {
        return $this->hasMany(Clientes::class, 'id_empleado');
    }
    public function profesionEmpleado()
    {
        return $this->belongsTo(Profesion::class, 'profesion_id','id');
    }
}
