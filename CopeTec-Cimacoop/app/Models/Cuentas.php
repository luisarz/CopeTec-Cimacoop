<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cuentas extends Model
{
    use Notifiable;
    protected $table = 'cuentas';
    protected $primaryKey = 'id_cuenta';
    protected $casts = [
        'data' => 'array',
    ];
    use HasFactory;

    public function asociado(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Asociados::class,'id_asociado');
    }
    public function tipo_cuenta(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TipoCuenta::class,'id_tipo_cuenta');
    }
    public function libreta(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne( LibretasModel::class,'id_cuenta');
    }
    public function beneficiarios(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Beneficiarios::class,'id_cuenta');

    }
    public  function interes(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(InteresesTipoCuenta::class,'id_interes');

    }
}
