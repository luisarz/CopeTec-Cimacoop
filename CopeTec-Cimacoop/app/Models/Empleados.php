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
}
