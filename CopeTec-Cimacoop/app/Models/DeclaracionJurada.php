<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeclaracionJurada extends Model
{

    protected $table = 'declaracion_juradas';
    protected $primaryKey = 'declaracion_id';
    use HasFactory;
}
