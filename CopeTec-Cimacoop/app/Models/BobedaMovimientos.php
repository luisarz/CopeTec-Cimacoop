<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobedaMovimientos extends Model
{
    protected $table = "bobeda_movimientos";
    protected $primaryKey = "id_bobeda_movimiento";
    use HasFactory;
}
