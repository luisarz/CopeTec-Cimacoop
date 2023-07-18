<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoGarantia extends Model
{
    protected $table = 'tipo_garantia';
    protected $primaryKey = 'id_tipo_garantia';
    use HasFactory;
}
