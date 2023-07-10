<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferenciaSolicitud extends Model
{
    protected $table = 'referencia_solicitud';
    protected $primaryKey = 'id_referencia_solicitud';
    protected $fillable = [
        'id_referencia_solicitud',
        'id_solicitud',
        'id_referencia'
    ];
    
    use HasFactory;
}
