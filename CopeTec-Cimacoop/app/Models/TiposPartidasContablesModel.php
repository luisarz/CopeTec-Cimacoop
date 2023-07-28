<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposPartidasContablesModel extends Model
{
    protected $table = 'tipos_partidas';
    protected $primaryKey = 'id_tipo_partida';
    use HasFactory;
}
