<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asociados extends Model
{
    protected $table = "asociados";
    protected $primaryKey = "id_asociado";
    use HasFactory;
}
