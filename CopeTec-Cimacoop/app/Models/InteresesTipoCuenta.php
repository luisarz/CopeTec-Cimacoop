<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteresesTipoCuenta extends Model
{
    protected $table = 'intereses_tipo_cuenta';
    protected $primaryKey = 'id_intereses_tipo_cuenta';
    use HasFactory;
}
