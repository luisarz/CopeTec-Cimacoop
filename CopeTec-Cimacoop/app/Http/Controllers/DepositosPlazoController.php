<?php

namespace App\Http\Controllers;

use App\Models\Asociados;
use App\Models\Cuentas;
use App\Models\DepositosPlazo;
use App\Models\Plazos;
use App\Models\TasasPlazos;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DepositosPlazoController extends Controller
{
    public function index()
    {
        $depositosplazo = DepositosPlazo::join('asociados', 'depositos_plazo.id_asociado', '=', 'asociados.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('plazos_tasas', 'plazos_tasas.id_tasa', '=', 'depositos_plazo.interes_deposito')
            ->join('plazos', 'plazos.id_plazo', '=', 'depositos_plazo.plazo_deposito')
            ->where('depositos_plazo.estado', 1)
            ->select(
                'clientes.nombre',
                'depositos_plazo.id_deposito_plazo_fijo',
                'depositos_plazo.numero_certificado',
                'depositos_plazo.monto_deposito',
                'depositos_plazo.interes_mensual',
                'depositos_plazo.fecha_deposito',
                'depositos_plazo.fecha_vencimiento',
                'plazos.meses',
                'plazos_tasas.valor'
            )
            ->orderBy('depositos_plazo.numero_certificado', 'desc')
            ->paginate(10);



        return view('captaciones.depositosplazo.index', compact('depositosplazo'));
    }
    public function add()
    {
        $asociados = Asociados::join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->where('asociados.id_asociado', '!=', 0)
            ->select('asociados.id_asociado', 'clientes.nombre', 'clientes.dui_cliente')->get();
        $fecha = date('Y-m-d');
        $plazos = Plazos::All();
        $certificado = DepositosPlazo::orderBy('numero_certificado', 'desc')->first();
        if ($certificado) {
            $certificado = $certificado->numero_certificado + 1;
        } else {
            $certificado = 1;
        }

        return view('captaciones.depositosplazo.add', compact('asociados', 'plazos', 'fecha', 'certificado'));
    }
    public function post(Request $request)
    {
        $deposito = new DepositosPlazo();
        $deposito->numero_certificado = $request->numero_certificado;
        $deposito->id_asociado = $request->id_asociado;
        $deposito->monto_deposito = $request->monto_deposito;
        $deposito->forma_deposito = $request->forma_deposito;
        $deposito->numero_cheque = $request->numero_cheque;
        $deposito->id_cuenta_depositar = $request->id_cuenta_depositar;
        $deposito->interes_deposito = $request->interes_deposito;
        $deposito->plazo_deposito = $request->plazo_deposito;
        $deposito->fecha_deposito = $request->fecha_deposito;
        $deposito->fecha_vencimiento = $request->fecha_vencimiento;
        $deposito->forma_pago_interes = $request->forma_pago_interes;
        $fechaVencimiento = Carbon::parse($request->fecha_vencimiento);
        $deposito->fecha_activacion_automatica = $fechaVencimiento->addDays(5);
        $deposito->is_renoved = 0;
        $deposito->interes_total = $request->interes_total;
        $deposito->interes_mensual = $request->interes_mensual;
        $deposito->estado = 1;
        $deposito->save();
        return redirect('/captaciones/depositosplazo');
    }
    public function edit($id)
    {
        $deposito = DepositosPlazo::where('id_deposito_plazo_fijo', '=', $id)->first();
        
        $asociados = Asociados::join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->where('asociados.id_asociado', '!=', 0)
            ->select('asociados.id_asociado', 'clientes.nombre', 'clientes.dui_cliente')->get();
        $plazos = Plazos::All();

        $cuentas = Cuentas::join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->select('cuentas.id_cuenta', 'cuentas.numero_cuenta', 'clientes.nombre', 'tipos_cuentas.descripcion_cuenta')
            ->where('cuentas.id_asociado', '=', $deposito->id_asociado)
            ->get();
        $tasas=TasasPlazos::where('id_plazo','=',$deposito->plazo_deposito)->get();


        return view('captaciones.depositosplazo.edit', compact('deposito', 'asociados', 'plazos','cuentas','tasas'));

    }
    public function put(Request $request)
    {

        $deposito = DepositosPlazo::findorfail($request->id_deposito_plazo_fijo);
        $deposito->numero_certificado = $request->numero_certificado;
        $deposito->id_asociado = $request->id_asociado;
        $deposito->monto_deposito = $request->monto_deposito;
        $deposito->forma_deposito = $request->forma_deposito;
        $deposito->numero_cheque = $request->numero_cheque;
        $deposito->id_cuenta_depositar = $request->id_cuenta_depositar;
        $deposito->interes_deposito = $request->interes_deposito;
        $deposito->plazo_deposito = $request->plazo_deposito;
        $deposito->fecha_deposito = $request->fecha_deposito;
        $deposito->fecha_vencimiento = $request->fecha_vencimiento;
        $deposito->forma_pago_interes = $request->forma_pago_interes;
        $fechaVencimiento = Carbon::parse($request->fecha_vencimiento);
        $deposito->fecha_activacion_automatica = $fechaVencimiento->addDays(5);
        $deposito->is_renoved = 0;
        $deposito->interes_total = $request->interes_total;
        $deposito->interes_mensual = $request->interes_mensual;
        $deposito->estado = 1;
        $deposito->save();
        return redirect('/captaciones/depositosplazo');
    }



}