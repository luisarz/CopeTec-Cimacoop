<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiarios extends Model
{
    protected $table = "beneficiarios";
    protected $primaryKey = "id_beneficiario";
    use HasFactory;
    public function cuenta(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Cuentas::class,'id_cuenta');
    }
    public function parentesco_cliente(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Parentesco::class,'parentesco','id_parentesco');

    }
}
