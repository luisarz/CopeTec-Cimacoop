<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiquidacionModel extends Model
{
    protected $table = 'liquidacion';
    protected $primaryKey = 'id_liquidacion';
    use HasFactory;
}
