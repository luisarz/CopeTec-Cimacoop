<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    public $timestamps = false;
    protected $table = 'modulo';
    protected $primaryKey = 'id_modulo';
    use HasFactory;
}
