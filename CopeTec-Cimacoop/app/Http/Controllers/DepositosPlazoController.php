<?php

namespace App\Http\Controllers;

use App\Models\Asociados;
use App\Models\Cuentas;
use App\Models\DepositosPlazo;
use App\Models\Plazos;
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
        $asociados = Asociados::join('clientes','clientes.id_cliente','=','asociados.id_cliente')
        ->where('asociados.id_asociado','!=',0)
        ->select('asociados.id_asociado','clientes.nombre','clientes.dui_cliente')->get();
        // dd($asociados);
        $fecha = date('Y-m-d');

        $plazos = Plazos::All();
        //obtener el ultimo numero de certificado
        $certificado = DepositosPlazo::orderBy('numero_certificado', 'desc')->first();
        if ($certificado) {
            $certificado = $certificado->numero_certificado + 1;
        } else {
            $certificado = 1;
        }

        return view('captaciones.depositosplazo.add',compact('asociados','plazos','fecha','certificado'));
    }


}
