<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudCredito extends Model
{
    protected $table = 'solicitud_credito';
    protected $primaryKey = 'id_solicitud';
    protected $keyType = 'string';
    public $incrementing = false;
    use HasFactory;
    public function destinoCredito(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Catalogo::class, 'destino');

    }
    public function  cliente(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Clientes::class, 'id_cliente');

    }
    public function referencias(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ReferenciaSolicitud::class, 'id_solicitud', 'id_referencia');
    }
    public function tipoGarantia()
    {
        return $this->belongsTo(TipoGarantia::class, 'tipo_garantia', 'id_tipo_garantia');
    }


}
