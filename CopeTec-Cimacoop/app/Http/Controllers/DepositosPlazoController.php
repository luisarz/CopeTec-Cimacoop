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
    public  function post(Request $request){
        dd($request->all());

        $request->validate([
            'id_asociado' => 'required',
            'id_plazo' => 'required',
            'monto' => 'required',
            'interes' => 'required',
            'fecha_inicio' => 'required',
            'fecha_vencimiento' => 'required',
            'numero_certificado' => 'required',
        ]);
        $deposito = new DepositosPlazo();
        $deposito->numero_certificado = $request->numero_certificado;
        $deposito->id_asociado = $request->id_asociado;
        $deposito->monto_deposito = $request->monto_deposito;
        $deposito->numero_cheque = $request->numero_cheque;
        $deposito->id_cuenta_depositar=$request->id_cuenta_depoositar;
        $deposito->interes = $request->interes;
        $deposito->fecha_deposito = $request->fecha_deposito;
        $deposito->fecha_vencimiento = $request->fecha_vencimiento;
        $deposito->forma_pago_interes = $request->forma_pago_interes;
        $deposito->fecha_activacion_automatica = addDays($request->fecha_vencimiento,5);
        $deposito->is_renoved=0;
        $deposito->estado = 1;
        $deposito->save();



        return redirect()->route('depositosplazo.index')->with('success','Deposito a plazo creado correctamente');
    }


}
