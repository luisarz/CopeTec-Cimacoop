<?php

namespace App\Http\Controllers;

use App\Models\Bobeda;
use App\Models\BobedaMovimientos;
use App\Models\Cajas;
use App\Models\Cuentas;
use App\Models\TipoCuenta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BobedaController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $bobeda = Bobeda::first();

        $movimientoBobeda = BobedaMovimientos::join('cajas', 'cajas.id_caja', 'bobeda_movimientos.id_caja')
            ->where('bobeda_movimientos.fecha_operacion', '>=', $today)
            ->orderBy('bobeda_movimientos.id_bobeda_movimiento', 'desc')
            ->paginate(10);

        $trasladoACaja = BobedaMovimientos::where('tipo_operacion', '1')
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');
        $recibidoDeCaja = BobedaMovimientos::where('tipo_operacion', '2')
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');

        $aperturaCaja = BobedaMovimientos::where('tipo_operacion', 3)
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');


        return view("bobeda.index", compact("movimientoBobeda", 'bobeda', 'trasladoACaja', 'recibidoDeCaja', "aperturaCaja"));
    }


    public function transferir($id)
    {
        $bobeda = Bobeda::findOrFail($id);
        $cajas = Cajas::all();
        return view("bobeda.transferir", compact("bobeda", "cajas"));
    }
    public function aperturarBobeda($id)
    {
        $bobeda = Bobeda::findOrFail($id);
        return view("bobeda.aperturar", compact("bobeda"));
    }
    public function realizarAperturaBobeda(Request $requet)
    {
        $movimientoBobeda = new BobedaMovimientos();
        $movimientoBobeda->id_bobeda = $requet->id_bobeda;
        $movimientoBobeda->id_caja = 0;
        $movimientoBobeda->tipo_operacion = 3; //Apertura de Caja
        $movimientoBobeda->estado = 2;
        $movimientoBobeda->fecha_operacion = Carbon::now();
        $movimientoBobeda->monto = $requet->monto;
        $movimientoBobeda->observacion = $requet->observacion;
        $movimientoBobeda->save();

        $bobeda = Bobeda::findOrFail($requet->id_bobeda);
        $bobeda->saldo_bobeda = $requet->monto;
        $bobeda->estado_bobeda = 1;
        $bobeda->save();
        return redirect("/bobeda");
    }
    public function recibir($id)
    {
        $bobeda = Bobeda::findOrFail($id);
        $cajas = Cajas::all();
        return view("bobeda.recibir", compact("bobeda", "cajas"));
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
            $bobeda->saldo_bobeda = $bobeda->saldo_bobeda - $request->monto;
            $bobeda->save();

            return redirect("/bobeda");

        }
        return redirect("/bobeda/transferir/$request->id_bobeda")->withInput()->withErrors(['Monto' => 'El monto que intentas enviar sobrepasa el limite']);

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
        $trasladoACaja = BobedaMovimientos::where('tipo_operacion', '1')
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');
        $recibidoDeCaja = BobedaMovimientos::where('tipo_operacion', '2')
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');
        return redirect('/bobeda');

    }



    public function delete(Request $request)
    {
        Cuentas::destroy($request->id);
        return redirect("/movimientos");
    }

    public function put(Request $request)
    {
        $cliente = Cuentas::findOrFail($request->id);
        if ($cliente->dui_cliente != $request->dui_cliente) {
            $cliente = Cuentas::where("dui_cliente", $request->dui_cliente)->first();
            if ($cliente && $cliente->count() > 0) {
                return redirect("/movimientos/" . $request->id)->withInput()->withErrors(["dui_cliente" => "Cambió el DUI y el ingresado ya existe en otro cliente!!"]);
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
            return redirect("/movimientos");
        }

    }
    public function anularTraslado(Request $request)
    {
        $movimientoBobeda = BobedaMovimientos::findOrFail($request->id);
        $movimientoBobeda->estado = 3; //Anulada
        $movimientoBobeda->save();
        $bobeda = Bobeda::first();
        $bobeda->saldo_bobeda = $bobeda->saldo_bobeda + $movimientoBobeda->monto;
        $bobeda->save();
        return redirect("/bobeda");
    }
}