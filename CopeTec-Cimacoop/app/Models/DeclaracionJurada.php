<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeclaracionJurada extends Model
{

    protected $table = 'declaracion_juradas';
    protected $primaryKey = 'declaracion_id';
    protected $fillable = [
        'lugar',
        'fecha',
        'n_depositos',
        'n_retiros',
        'val_prom_depositos',
        'val_prom_retiros',
        'origen_fondos',
        'comprobante_procendecia_fondo',
        'otro_origen_fondos',
        'otro_comprobante_fondos',
        'id_cliente',
        'id_cuenta'
    ];
    use HasFactory;
}
