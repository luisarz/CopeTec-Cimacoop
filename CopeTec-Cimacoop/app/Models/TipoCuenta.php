<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCuenta extends Model
{
    protected $table = 'tipos_cuentas';
    public $primaryKey = 'id_tipo_cuenta';
   

    use HasFactory;
    public  function interes(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(InteresesTipoCuenta::class,'id_tipo_cuenta');

    }
}
