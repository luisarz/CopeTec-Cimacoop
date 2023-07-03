<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plazos extends Model
{
    use HasFactory;
    protected $table = 'plazos';
    protected $primaryKey='id_plazo';
}
