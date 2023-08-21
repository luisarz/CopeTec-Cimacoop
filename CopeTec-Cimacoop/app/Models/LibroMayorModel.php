<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroMayorModel extends Model
{
    protected $table = 'libro_mayor';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use HasFactory;
}
