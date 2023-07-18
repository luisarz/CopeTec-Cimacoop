<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagosCredito extends Model
{
    protected $table = 'pagos_credito';
    protected $primaryKey = 'id_pago_credito';
    protected $keyType = 'string';
    public $incrementing = false;
    use HasFactory;
}
