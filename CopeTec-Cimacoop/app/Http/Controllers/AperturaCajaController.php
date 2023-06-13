<?php

namespace App\Http\Controllers;

use App\Models\AperturaCaja;
use App\Models\Bobeda;
use App\Models\BobedaMovimientos;
use App\Models\Cajas;
use App\Models\Cuentas;
use App\Models\TipoCuenta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AperturaCajaController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $cajasApertuaradas = AperturaCaja::join('cajas','cajas.id_caja','=','apertura_caja.id_caja')
        ->join('users','users.id','=','apertura_caja.id_usuario')
        ->join('empleados','empleados.id_empleado','=','users.id_empleado_usuario')
        ->where('apertura_caja.fecha_apertura', '>=', $today)
        ->where('apertura_caja.estado','=','1')->paginate(10);
        return view("apertura.index", compact("cajasApertuaradas"));
    }

    public function aperturar()
    {
        $cajas = Cajas::where("estado_caja", 0)->get();
        return view("apertura.aperturarcaja", compact("cajas"));
    }

    public function aperturarcaja(Request $request)
    {
        $today = Carbon::today();
        $apertuarCaja= new AperturaCaja();
        $apertuarCaja->id_caja = $request->id_caja;
        $apertuarCaja->monto_apertura = $request->monto_apertura;
        $apertuarCaja->fecha_apertura = $today;
        $apertuarCaja->estado = 1;
        $apertuarCaja->id_usuario= auth()->user()->id;
        $apertuarCaja->save();
        //actualzar el estado de la caja
        $cajaAperturada = Cajas::findOrFail($request->id_caja);
        $cajaAperturada->estado_caja = 1;
        $cajaAperturada->save();
        $cajasApertuaradas = AperturaCaja::where('fecha_apertura', '>=', $today)
            ->where('estado', '=', '0')->paginate(10);
        return view("apertura.index", compact("cajasApertuaradas"));
    }
    public function recibir($id)
    {
        $bobeda = Bobeda::findOrFail($id);
        $cajas = Cajas::all();
        return view("apertura.recibir", compact("bobeda", "cajas"));
    }

    public function realizarTraslado(Request $request)
    {

        $bobeda = Bobeda::first();
        if ($bobeda->saldo_bobeda >= $request->monto) {
            $bobedaMovimiento = new BobedaMovimientos();
            $bobedaMovimiento->id_bobeda = $request->id_bobeda;
            $bobedaMovimiento->id_caja = $request->id_caja;
            $bobedaMovimiento->tipo_operacion = $request->tipo_operacion;
            $bobedaMovimiento->estado = 1;
            $bobedaMovimiento->monto = $request->monto;
            $bobedaMovimiento->fecha_operacion = Carbon::now();
            $bobedaMovimiento->observacion = $request->observacion;
            $bobedaMovimiento->save();
            $movimientoBobeda = BobedaMovimientos::paginate(10);
            $bobeda->saldo_bobeda = $bobeda->saldo_bobeda - $request->monto;
            $bobeda->save();
            return view("apertura.index", compact("movimientoBobeda", "bobeda"));
        }
        return redirect("/apertura/transferir/$request->id_bobeda")->withInput()->withErrors(['Monto' => 'El monto que intentas enviar sobrepasa el limite']);

    }
    public function recibirTraslado(Request $request)
    {

        $bobeda = Bobeda::first();
        $bobedaMovimiento = new BobedaMovimientos();
        $bobedaMovimiento->id_bobeda = $request->id_bobeda;
        $bobedaMovimiento->id_caja = $request->id_caja;
        $bobedaMovimiento->tipo_operacion = $request->tipo_operacion;
        $bobedaMovimiento->estado = 1;
        $bobedaMovimiento->monto = $request->monto;
        $bobedaMovimiento->fecha_operacion = Carbon::now();
        $bobedaMovimiento->observacion = $request->observacion;
        $bobedaMovimiento->save();
        $movimientoBobeda = BobedaMovimientos::paginate(10);
        $bobeda->saldo_bobeda = $bobeda->saldo_bobeda + $request->monto;
        $bobeda->save();
        return view("apertura.index", compact("movimientoBobeda", "bobeda"));

    }



    public function delete(Request $request)
    {
        Cuentas::destroy($request->id);
        return redirect("/apertura");
    }

    public function put(Request $request)
    {
        $cliente = AperturaCaja::findOrFail($request->id);
        if ($cliente->dui_cliente != $request->dui_cliente) {
            $cliente = Cuentas::where("dui_cliente", $request->dui_cliente)->first();
            if ($cliente && $cliente->count() > 0) {
                return redirect("/apertura/" . $request->id)->withInput()->withErrors(["dui_cliente" => "Cambió el DUI y el ingresado ya existe en otro cliente!!"]);
            }
        } else {
            $cliente->nombre = $request->nombre;
            $cliente->genero = $request->genero;
            $cliente->fecha_nacimiento = $request->fecha_nacimiento;
            $cliente->dui_cliente = $request->dui_cliente;
            $cliente->dui_extendido = $request->dui_extendido;
            $cliente->fecha_expedicion = $request->fecha_expedicion;
            $cliente->telefono = $request->telefono;
            $cliente->nacionalidad = $request->nacionalidad;
            $cliente->estado_civil = $request->estado_civil;
            $cliente->direccion_personal = $request->direccion_personal;
            $cliente->direccion_negocio = $request->direccion_negocio;
            $cliente->nombre_negocio = $request->nombre_negocio;
            $cliente->tipo_vivienda = $request->tipo_vivienda;
            $cliente->observaciones = $request->observaciones;
            $cliente->estado = 1;
            $cliente->save();
            return redirect("/apertura");
        }

    }
}
