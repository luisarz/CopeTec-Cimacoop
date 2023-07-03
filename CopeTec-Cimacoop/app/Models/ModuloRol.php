<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuloRol extends Model
{
    public $timestamps = false;
    protected $table = 'modulo_rol';
    protected $primaryKey = 'id';
    use HasFactory;
}
