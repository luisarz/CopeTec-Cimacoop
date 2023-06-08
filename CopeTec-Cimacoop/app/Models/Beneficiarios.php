<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiarios extends Model
{
    protected $table = "beneficiarios";
    protected $primaryKey = "id_beneficiario";
    use HasFactory;
}
