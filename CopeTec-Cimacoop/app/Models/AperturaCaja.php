<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AperturaCaja extends Model
{
    protected $table = 'apertura_caja';
    protected $primaryKey = 'id_apertura_caja';
    use HasFactory;
}
