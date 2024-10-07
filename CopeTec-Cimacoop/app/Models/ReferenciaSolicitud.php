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
    public function referencias()
    {
        return $this->belongsTo(Referencias::class, 'id_referencia', 'id_referencia');

    }
    public function parentesco()
    {
        return $this->hasOne(Parentesco::class, 'id_parentesco', 'parentesco_id');
    }
}
