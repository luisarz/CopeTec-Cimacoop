<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturasDetalleModel extends Model
{
    use HasFactory;
     use HasFactory;
    protected $table = "facturas_detalle";
    protected $primaryKey = "id_detalle_factura";
}
