<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartidaContableDetalleModel extends Model
{
    protected $table = "partida_contables_detalle";
    protected $primaryKey = "id_detalle_partida_contable";
    use HasFactory;
    public function partidaContable()
    {
        return $this->belongsTo(PartidaContable::class, 'id_partida');
    }
}



