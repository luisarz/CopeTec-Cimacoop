<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CierreMensualPartidaModel extends Model
{
    protected $table = 'cierre_mensual_partida';
    protected $primaryKey = 'id_cierre_mensual_partida';
    use HasFactory;
}
