<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referencias extends Model
{
    protected $table = 'referencias';
    protected $primaryKey = 'id_referencia';
    use HasFactory;
}
