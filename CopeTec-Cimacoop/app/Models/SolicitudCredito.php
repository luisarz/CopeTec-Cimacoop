<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudCredito extends Model
{
    protected $table = 'solicitud_credito';
    protected $primaryKey = 'id_solicitud';
    use HasFactory;
}
