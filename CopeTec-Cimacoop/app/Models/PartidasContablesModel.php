<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartidasContablesModel extends Model
{
    protected $table = 'partidas_contables';
    protected $primaryKey = 'id_partida_contable';
    use HasFactory;
}
