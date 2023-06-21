<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempPassword extends Model
{
    protected $table = 'temp_password';
    protected $primaryKey = 'id_temp_password';
    use HasFactory;
}
