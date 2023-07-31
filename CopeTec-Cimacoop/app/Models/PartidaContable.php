<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartidaContable extends Model
{
    protected $table = "partidas_contables";
    protected $primarykey = "id_partida_contable";
    protected $keyType = 'string';
    public $incrementing = false;
    use HasFactory;
}
