<?php

namespace App\Http\Controllers;

use App\Models\Asociados;
use App\Models\DepositosPlazo;
use Illuminate\Http\Request;

class DepositosPlazoController extends Controller
{
    public function index()
    {
        $depositosplazo = DepositosPlazo::join('asociados','depositos_plazo.id_asociado','=','asociados.id_asociado')
        ->join('clientes','clientes.id_cliente','=','asociados.id_cliente')
        ->where('depositos_plazo.estado',1)
        ->orderBy('depositos_plazo.numero_certificado','desc')
        ->paginate(10);
        return view('captaciones.depositosplazo.index',compact('depositosplazo'));
    }
    public function add()
    {
        $asociados = Asociados::where('estado',1)->get();
        return view('captaciones.depositosplazo.create');
    }
}
