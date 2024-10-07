<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    protected $table = 'parentesco';
    protected $primaryKey = 'id_parentesco';
    use HasFactory;
    public function beneficiario(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Beneficiarios::class,'parentesco');
    }
}
