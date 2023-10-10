<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturasModel extends Model
{
    use HasFactory;
    protected $table = 'facturas';
    protected $primaryKey = 'id_factura';
    protected $keyType = 'string';

    public $incrementing = false;
}
