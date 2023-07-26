<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCuentaCotableModel extends Model
{
    use HasFactory;
    protected $table = "catalogo_tipo";
    protected $primaryKey = "id_tipo_catalogo";
}
