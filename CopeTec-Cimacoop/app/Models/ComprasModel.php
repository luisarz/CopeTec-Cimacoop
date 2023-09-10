<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprasModel extends Model
{
    use HasFactory;
    protected $table = 'compras';
    protected $primayKey = 'id_compra';
    protected $keyType = 'string';
    public $incrementing = false;

}
