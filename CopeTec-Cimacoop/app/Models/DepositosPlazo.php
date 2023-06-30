<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositosPlazo extends Model
{
    use HasFactory;
    protected $table = 'depositos_plazo';
    protected $primaryKey = 'id_deposito_plazo_fijo';
}
