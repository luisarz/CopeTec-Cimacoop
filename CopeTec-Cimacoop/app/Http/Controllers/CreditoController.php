<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Credito;

class CreditoController extends Controller
{
   function index() 
   {
        $creditos = Credito::all();
        return view('creditos.abonos.index', compact('creditos'));
   }
}
