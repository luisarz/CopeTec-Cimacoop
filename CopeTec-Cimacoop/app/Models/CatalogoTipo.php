<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoTipo extends Model
{
    protected $table = 'catalogo_tipo';
    protected $primaryKey = 'id_tipo_catalogo';

    use HasFactory;
}
