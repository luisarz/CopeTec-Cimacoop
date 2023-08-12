<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteContabilidad extends Controller
{
   public function index()
   {
       return view('contabilidad.reportes.index');
   }
}
