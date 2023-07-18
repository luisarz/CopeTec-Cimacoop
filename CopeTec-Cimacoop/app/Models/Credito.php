<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    protected $primaryKey = 'id_credito';
    protected $casts = ['id_credito' => 'string'];
    public $incrementing = false;
    use HasFactory;
}
