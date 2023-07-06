<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiarosDepositos extends Model
{
    use HasFactory;
    protected $table = 'beneficiarios_depositos';
    protected $primaryKey = 'id_beneficiario';
}
