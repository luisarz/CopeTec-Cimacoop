<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudCreditoBienes extends Model
{
    protected $table = "solicitud_credito_bienes";
    protected $primaryKey = "id_propiedad";
    use HasFactory;
}
