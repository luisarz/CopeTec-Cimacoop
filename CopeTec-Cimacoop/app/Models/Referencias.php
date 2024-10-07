<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referencias extends Model
{
    protected $table = 'referencias';
    protected $primaryKey = 'id_referencia';
    use HasFactory;
    public function referencias()
    {
        return $this->hasMany(ReferenciaSolicitud::class, 'id_referencia', 'id_referencia');
    }
    public function parentesco()
    {
        return $this->hasOne(Parentesco::class, 'parentesco', 'id_parentesco');
    }
}
