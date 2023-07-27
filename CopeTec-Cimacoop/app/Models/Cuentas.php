<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuentas extends Model
{
    protected $table = 'cuentas';
    protected $primaryKey = 'id_cuenta';
    use HasFactory;

    public function asociado()
    {
        return $this->belongsTo(Asociados::class,'id_asociado');
    }
}
