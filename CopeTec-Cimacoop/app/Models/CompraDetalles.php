<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraDetalles extends Model
{
    use HasFactory;
    protected $table = "compras_detalle";
    protected $primaryKey = "id_detalle_compra";

}
