<?php

namespace App\Http\Controllers;

use App\Models\AperturaCaja;
use App\Models\Bobeda;
use App\Models\BobedaMovimientos;
use App\Models\Cajas;
use App\Models\Cuentas;
use App\Models\Empleados;
use App\Models\Movimientos;
use App\Models\TipoCuenta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AperturaCajaController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $cajasApertuaradas = AperturaCaja::join('cajas', 'cajas.id_caja', '=', 'apertura_caja.id_caja')
            ->join('users', 'users.id', '=', 'apertura_caja.id_usuario')
            ->join('empleados', 'empleados.id_empleado', '=', 'users.id_empleado_usuario')
            // ->where('apertura_caja.fecha_apertura', '>=', $today)
            // ->where('apertura_caja.estado', '=', '1')
            ->select('apertura_caja.*', 'users.id_empleado_usuario', 'empleados.nombre_empleado', 'cajas.*')

            ->orderby('apertura_caja.fecha_apertura', 'desc')->paginate(10);
        // dd($cajasApertuaradas);
        return view("apertura.index", compact("cajasApertuaradas"));
    }

    public function aperturar()
    {
        $id_empleado_usuario = session()->get('id_empleado_usuario');
        $cajas = Cajas::where("estado_caja", '=', '0')
            ->where('id_usuario_asignado', '=', '$id_empleado_usuario')
            ->get();
        $empleados = Empleados::where('id_empleado', '=', '$id_empleado_usuario')->get();
        return view("apertura.aperturarcaja", compact('cajas', 'empleados'));
    }
    public function gettraslado($id)
    {
        $trasladoPendiente = BobedaMovimientos::where('id_caja', '=', $id)
            ->whereNotIn('bobeda_movimientos.estado', [2, 3, 4])->first();
        if (is_null($trasladoPendiente)) {
            $trasladoPendiente = null;
        }
        return response()->json($trasladoPendiente);
    }

    public function aperturarcaja(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_caja' => ['required'],
            'monto_apertura' => ['required', 'numeric', 'min:0.01', 'max:9999999999.99'],
        ], [
            'id_caja.required' => 'Seleccione una caja.',
            'monto_apertura.required' => 'No tienes traslado pendiente de la Bobeda, solicita un traslado para poder aperturar la Caja.',
            'monto_apertura.numeric' => 'El campo Monto de Apertura debe ser numérico.',
            'monto_apertura.min' => 'El campo Monto de Apertura debe ser mayor o igual a 0.01.',
            'monto_apertura.max' => 'El campo Monto de Apertura debe ser menor o igual a 9999999999.99.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $trasladoBobeda = BobedaMovimientos::findOrFail($request->id_bobeda_movimiento);
            if ($trasladoBobeda->monto != $request->monto_apertura) {
                return redirect()->back()->withErrors(["monto_apertura" => "El monto de apertura no coincide con el monto enviado desde la Bobeda."])->withInput();
            } else {
                $apertuarCaja = new AperturaCaja();
                $apertuarCaja->id_caja = $request->id_caja;
                $apertuarCaja->monto_apertura = $request->monto_apertura;
                $apertuarCaja->fecha_apertura = now();
                $apertuarCaja->estado = 1;
                $apertuarCaja->id_usuario = auth()->user()->id;
                $apertuarCaja->save();
                /** actualzar el estado de la caja*/
                $cajaAperturada = Cajas::findOrFail($request->id_caja);
                $cajaAperturada->estado_caja = 1;
                $cajaAperturada->save();
                //Pasamos a recibido el traslado
                $trasladoBobeda->estado = 2;
                $trasladoBobeda->save();
                //actualizamos el saldo de la caja
                $caja = Cajas::findOrFail($request->id_caja);
                $caja->saldo = $request->monto_apertura;
                $caja->save();
                //insertar el movimiento
                $cajaReibe = Cajas::findOrFail($request->id_caja);
                $movimiento = new Movimientos();
                $movimiento->id_cuenta = 0;
                $movimiento->tipo_operacion = 3;
                $movimiento->monto = $request->monto_apertura;
                ;
                $movimiento->fecha_operacion = now();
                $movimiento->cajero_operacion = session()->get('id_empleado_usuario');
                $movimiento->id_caja = $request->id_caja;
                $movimiento->cliente_transaccion=$request->id_empleado;
                $movimiento->estado = 1;
                $movimiento->save();
                // $cajaReibe->saldo = $cajaReibe->saldo + $request->monto;
                $cajaReibe->save();

                return redirect("/apertura");
            }



        }




    }


    public function cortez($id)
    {

        $corteZ = AperturaCaja::findOrFail($id);
        $id_caja = $corteZ->id_caja;
        $caja = Cajas::findOrFail($id_caja);
        //obtenemos el saldo de la caja
        $corteZ->monto_cierre = $caja->saldo;
        $corteZ->estado = 3;
        $corteZ->hora_cierre = Carbon::now()->format('H:i:s');
        $corteZ->save();

        //insertar el movimiento

        $cajaCorteZ = Cajas::findOrFail($id_caja);
        $movimiento = new Movimientos();
        $movimiento->id_cuenta = 0;
        $movimiento->tipo_operacion = 6;
        $movimiento->monto = $caja->saldo;
        $movimiento->fecha_operacion = now();
        $movimiento->cajero_operacion = session()->get('id_empleado_usuario');
        $movimiento->id_caja = $id_caja;
        $movimiento->estado = 1;
        $movimiento->save();
        $cajaCorteZ->saldo = 0;
        $cajaCorteZ->estado_caja = 0;
        $cajaCorteZ->save();
        //actualizamos el estado del traslado
        $bobeda = Bobeda::first();
        $bobedaMovimiento = new BobedaMovimientos();
        $bobedaMovimiento->id_bobeda = $bobeda->id_bobeda;
        $bobedaMovimiento->id_caja = $id_caja;
        $bobedaMovimiento->tipo_operacion = 6;
        $bobedaMovimiento->estado = 1;
        $bobedaMovimiento->monto = $caja->saldo;
        $bobedaMovimiento->fecha_operacion = Carbon::now();
        $bobedaMovimiento->observacion = 'Corte Z ->Caja ' . $caja->numero_caja;
        $bobedaMovimiento->save();

        // $bobeda->saldo_bobeda = $bobeda->saldo_bobeda + $caja->saldo;


        return redirect("/apertura");
    }
}