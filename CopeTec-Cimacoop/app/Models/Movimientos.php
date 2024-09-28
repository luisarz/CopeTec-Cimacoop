<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimientos extends Model
{
    protected $table = 'movimientos';
    protected $primaryKey = 'id_movimiento';
    use HasFactory;
    public function cuenta()
    {
        return $this->belongsTo(Cuentas::class, 'id_cuenta');
    }
}
