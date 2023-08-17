<?php

namespace App\Models;

use App\Models\Asociados;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    use HasFactory;
    public function asociado()
    {
        return $this->hasOne(Asociados::class,'id_cliente');
    }
    public function cuentas()
    {
        return $this->hasMany(Cuentas::class,'id_asociado');
    }
    public function creditos()
    {
        return $this->hasMany(Credito::class,'id_cliente');
    }
    public function empleado()
    {
        return $this->belongsTo(Empleados::class,'id_empleado');
    }
}
