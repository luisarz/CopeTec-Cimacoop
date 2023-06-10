<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cajas extends Model

{
    protected $table = "cajas";
    protected $primaryKey = "id_caja";
    use HasFactory;
}
