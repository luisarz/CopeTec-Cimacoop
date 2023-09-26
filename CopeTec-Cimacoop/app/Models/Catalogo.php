<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
 protected $table = 'catalogo';
 protected $primaryKey = 'id_cuenta';
    use HasFactory;
    public function cuentasHijas()
    {
        return $this->hasMany(Catalogo::class, 'id_cuenta_padre');
    }
    public function movimientos()
    {
        return $this->hasMany(PartidaContableDetalleModel::class, 'id_cuenta'); // Suponiendo que 'id_cuenta' sea la clave foránea en 'partida_contable_detalle' que relaciona las cuentas con los movimientos.
    }
    
    public function parent()
    {
        return $this->hasOne(Catalogo::class, 'id_cuenta', 'id_cuenta_padre')->with('parent');
    }
    public function children()
    {
        return $this->hasMany(Catalogo::class, 'id_cuenta_padre')->with('children');
    }
}
