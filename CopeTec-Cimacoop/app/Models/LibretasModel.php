<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibretasModel extends Model
{
    use HasFactory;
    protected $table = "libretas";
    protected $primaryKey = "id_libreta";
}
