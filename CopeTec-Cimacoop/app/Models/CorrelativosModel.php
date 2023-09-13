<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrelativosModel extends Model
{
    use HasFactory;
    protected $table = 'correlativos';
    protected $primaryKey = 'id_correlativo';
}
