<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cuentas extends Model
{
    use Notifiable;
    protected $table = 'cuentas';
    protected $primaryKey = 'id_cuenta';
    protected $casts = [
        'data' => 'array',
    ];
    use HasFactory;

    public function asociado()
    {
        return $this->belongsTo(Asociados::class,'id_asociado');
    }
}
