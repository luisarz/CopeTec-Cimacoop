<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    protected $table = 'catalogo';
    protected $primaryKey = 'id_cuenta';
    use HasFactory;
    public function tipoCatalogo()
    {
        return $this->belongsTo(TipoCuentaCotableModel::class, 'tipo_catalogo');
    }
    public function detallePartida()
    {
        return $this->hasMany(PartidaContableDetalleModel::class,'id_cuenta');
    }
}
