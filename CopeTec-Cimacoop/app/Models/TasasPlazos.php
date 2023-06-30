<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TasasPlazos extends Model
{
    use HasFactory;
    protected $table = 'plazos_tasas';
    protected $primaryKey='id_tasa';
}
