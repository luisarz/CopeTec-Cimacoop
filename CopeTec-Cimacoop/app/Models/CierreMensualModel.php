<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CierreMensualModel extends Model
{
    protected $table = 'cierre_mensual';
    protected $primaryKey = 'id';
    use HasFactory;
}
