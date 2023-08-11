<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Credito extends Model
{
    use Notifiable;
    protected $primaryKey = 'id_credito';
    protected $casts = ['id_credito' => 'string'];
    public $incrementing = false;
    use HasFactory;
    public function cliente()
    {
        return $this->belongsTo(Clientes::class,'id_cliente');
    }
}
