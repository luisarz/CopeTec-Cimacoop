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
        $recibidoDeCaja = BobedaMovimientos::whereIn('tipo_operacion', [2, 6])
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');

        $aperturaCaja = BobedaMovimientos::where('tipo_operacion', 3)
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');
        $cancelados = BobedaMovimientos::whereIn('tipo_operacion', [1, 2])
            ->where('estado', '=', '3')
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');


        return view("bobeda.index", compact("movimientoBobeda", 'bobeda', 'trasladoACaja', 'recibidoDeCaja', "aperturaCaja",'cancelados'));
    }


    public function transferir($id)
    {
        $bobeda = Bobeda::findOrFail($id);
        $cajas = Cajas::where('id_caja', '!=', 0)->get();
        $id_empleado = session('id_empleado_usuario');
        $empleados = Empleados::where('id_empleado', '=', $id_empleado)->get();
        return view("bobeda.transferir", compact("bobeda", "cajas", 'empleados'));
    }
    public function aperturarBobeda($id)
    {
        $bobeda = Bobeda::find($id);
        $id_empleado = session('id_empleado_usuario');
        $empleados= Empleados::where('id_empleado','=',$id_empleado)->get();
        return view("bobeda.aperturar", compact("bobeda",'empleados'));
    }
  public function cerrarBobeda($id)
    {
        $bobeda = Bobeda::find($id);
        $id_empleado = session('id_empleado_usuario');
        $empleados= Empleados::where('id_empleado','=',$id_empleado)->get();
        return view("bobeda.cerrar", compact("bobeda",'empleados'));
    }
    public function realizarCierreBobeda(Request $requet)
    {
        $movimientoBobeda = new BobedaMovimientos();
        $movimientoBobeda->id_bobeda = $requet->id_bobeda;
        $movimientoBobeda->id_caja = 0;
        $movimientoBobeda->tipo_operacion = 4; //Cierre de Bobeda
        $movimientoBobeda->estado = 2;
        $movimientoBobeda->fecha_operacion = Carbon::now();
        $movimientoBobeda->monto = $requet->monto;
        $movimientoBobeda->observacion = $requet->observacion;
        $movimientoBobeda->id_empleado = $requet->id_empleado;
        $movimientoBobeda->save();

        $bobeda = Bobeda::findOrFail($requet->id_bobeda);
        $bobeda->saldo_bobeda = $requet->monto;
        $bobeda->estado_bobeda = 0;
        $bobeda->save();
        return redirect("/bobeda");
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
        $movimientoBobeda->id_empleado = $requet->id_empleado;
        $movimientoBobeda->save();

        $bobeda = Bobeda::findOrFail($requet->id_bobeda);
        $bobeda->saldo_bobeda = $requet->monto;
        $bobeda->estado_bobeda = 1;
        $bobeda->save();
        return redirect("/bobeda");
    }
    public function recibirDeCajaABobeda()
    {
        $cajas = Cajas::where('id_caja', '!=', 0)->get();
        $id_empleado = session('id_empleado_usuario');
        $empleados = Empleados::where('id_empleado', '=', $id_empleado)->get();
        return view("bobeda.recibir", compact("cajas", 'empleados'));
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
            $bobedaMovimiento->id_empleado = $request->id_empleado;
            $bobedaMovimiento->save();
            $bobeda->saldo_bobeda = $bobeda->saldo_bobeda - $request->monto;
            $bobeda->save();

            // return redirect("/reportes/movimientosBobeda/$request->id_bobeda");
        return redirect("/reportes/comprobanteMovimientoBobeda/$bobedaMovimiento->id_bobeda_movimiento");

        }
        return redirect("/bobeda/transferir/$request->id_bobeda")->withInput()->withErrors(['Monto' => 'El monto que intentas enviar sobrepasa el limite']);

    }
    public function recibirCorte(Request $request)
    {
        $bobeda= Bobeda::first();//Obtengo dato de la bobeda
        $bobedaMovimiento =  BobedaMovimientos::findOrFail($request->id_corte_movimiento); //Buesco el movimiento
        $bobedaMovimiento->estado = 2;
        $bobedaMovimiento->save();
        $bobeda->saldo_bobeda = $bobeda->saldo_bobeda + $bobedaMovimiento->monto;
        $bobeda->save();
        //actualziar el corte papra que se cierre
        $corteZ = AperturaCaja::where('id_caja','=',$bobedaMovimiento->id_caja)
        ->where('estado','=',3)
        ->first();

        $corteZ->estado = 0;
        $corteZ->hora_aceptado = Carbon::now()->format('H:i:s');
        $corteZ->save();
        // actualizar la caja para que se cierre
   
        
           return redirect('/bobeda');
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
    public function getTrasladoPendienteCajaABobeda($id){
        $movimientos = Movimientos::where('id_caja','=',$id)
        ->where('tipo_operacion','=',4)
        ->where('id_cuenta','=',0)
        ->where('estado','=',0)
        ->first();
        if(is_null($movimientos)){
           return response()->json(0);
        }

        return response()->json($movimientos);
    }

    public function recibirTransferenciaDeCaja(Request $request){
        $bobeMovimiento = new BobedaMovimientos();
        $bobeMovimiento->id_bobeda = 1;
        $bobeMovimiento->id_caja = $request->id_caja;
        $bobeMovimiento->tipo_operacion = 2;
        $bobeMovimiento->estado = 2;
        $bobeMovimiento->monto = $request->monto;
        $bobeMovimiento->fecha_operacion = Carbon::now();
        $bobeMovimiento->observacion = $request->observacion;
        $bobeMovimiento->id_empleado = $request->id_empleado;
        $bobeMovimiento->save();
        //actulizamos el movimiento de caja
        $movimiento = Movimientos::findOrFail($request->id_movimiento);
        $movimiento->estado = 1;
        $movimiento->save();

        return redirect("/reportes/comprobanteMovimientoBobeda/$bobeMovimiento->id_bobeda");
    }
}