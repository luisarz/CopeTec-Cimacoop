<?php

namespace App\Http\Controllers;

use App\Models\Asociados;
use App\Models\BobedaMovimientos;
use App\Models\Cajas;
use App\Models\Catalogo;
use App\Models\Clientes;
use App\Models\Configuracion;
use App\Models\Cuentas;
use App\Models\Empleados;
use App\Models\Movimientos;
use App\Models\PartidaContable;
use App\Models\PartidaContableDetalleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MovimientosController extends Controller
{

    public function index()
    {
        $id_empleado_usuario = session()->get('id_empleado_usuario');
        $cajaAperturada = Cajas::join('apertura_caja', 'apertura_caja.id_caja', '=', 'cajas.id_caja')
            ->where("estado_caja", '=', '1')
            ->where('id_usuario_asignado', '=', $id_empleado_usuario)
            ->select('cajas.id_caja', 'cajas.saldo', 'cajas.numero_caja', 'cajas.id_usuario_asignado', 'apertura_caja.monto_apertura', 'apertura_caja.fecha_apertura')
            ->first();
        if (is_null($cajaAperturada)) {
            return redirect("/apertura")->withErrors('No tienes caja aperturada, te redirigimos aqui, para que puedas aperturala y poder realizar movimientos.');

        }
        $idCajaAperturada = $cajaAperturada->id_caja;
        $saldo = $cajaAperturada->saldo;

        $movimientos = Movimientos::join('cuentas', 'cuentas.id_cuenta', '=', 'movimientos.id_cuenta')
            ->join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->whereDate('movimientos.fecha_operacion', today())
            ->where('movimientos.id_caja', '=', $idCajaAperturada)
            ->select('movimientos.*', 'clientes.nombre', 'tipos_cuentas.descripcion_cuenta', 'cuentas.numero_cuenta', 'clientes.dui_cliente')
            ->orderby('movimientos.id_movimiento', 'desc')
            ->paginate(10);



        $totalMovimientos = Movimientos::selectRaw(
            'SUM(CASE WHEN tipo_operacion = 1 AND estado = 1 THEN monto ELSE 0 END) AS totalDepositos,
             SUM(CASE WHEN tipo_operacion = 2 AND estado = 1 THEN monto ELSE 0 END) AS totalRetiros, 
             SUM(CASE WHEN tipo_operacion = 7 AND estado = 1 THEN monto ELSE 0 END) AS totalAbonosCreditos, 
             SUM(CASE WHEN estado = 0 THEN monto ELSE 0 END) AS totalAnuladas'
        )
            ->whereDate('fecha_operacion', today())
            ->where('id_caja', '=', $cajaAperturada->id_caja)
            ->first();

        $totalDepositos = $totalMovimientos->totalDepositos;
        $totalRetiros = $totalMovimientos->totalRetiros;
        $totalAnuladas = $totalMovimientos->totalAnuladas;
        $totalAbonosCreditos = $totalMovimientos->totalAbonosCreditos;
        // $saldo = ($cajaAperturada->monto_apertura + $totalDepositos) - ($totalRetiros + $totalAnuladas);

        return view(
            "movimientos.index",
            compact(
                "movimientos",
                "cajaAperturada",
                "totalRetiros",
                "totalDepositos",
                "totalAnuladas",
                "saldo",
                "totalAbonosCreditos"
            )
        );
    }

    public function depositar($id)
    {
        $aperturaCaja = $id;
        $cuentas = Cuentas::join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->select('cuentas.id_cuenta', 'clientes.nombre', 'tipos_cuentas.descripcion_cuenta', 'cuentas.numero_cuenta', 'cuentas.numero_cuenta', 'clientes.dui_cliente')
            ->whereNotIn('clientes.estado', [0, 7])
            ->get();
        return view("movimientos.depositar", compact("cuentas", "aperturaCaja"));
    }
    public function retirar($id)
    {
        $aperturaCaja = $id;
        $cuentas = Cuentas::join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->select('cuentas.id_cuenta', 'clientes.nombre', 'tipos_cuentas.descripcion_cuenta', 'cuentas.numero_cuenta', 'cuentas.saldo_cuenta', 'clientes.dui_cliente')
            ->whereNotIn('clientes.estado', [0, 7])
            ->get();

        return view("movimientos.retirar", compact("cuentas", "aperturaCaja"));
    }

    public function traslado($id)
    {
        $aperturaCaja = $id;
        $tienePendientes = 0;
        $trasladoPendiente = BobedaMovimientos::where('id_caja', '=', $id)
            ->whereNotIn('bobeda_movimientos.estado', [2, 3, 4])->get();
        $tienePendientes = $trasladoPendiente->count();
        $id_empleado = session()->get('id_empleado_usuario');
        $empleados = Empleados::where('id_empleado', '=', $id_empleado)->first();
        $cajero = $empleados->nombre_empleado;

        return view("movimientos.traslado", compact("trasladoPendiente", "aperturaCaja", "tienePendientes", "cajero"));
    }

    public function transferenciabobeda($id)
    {
        $cajas = Cajas::findOrFail($id);
        return view("movimientos.transferenciabobeda", compact("cajas"));
    }
    public function getTrasladoPendiente($id)
    {
        $trasladoPendiente = BobedaMovimientos::find($id);
        if ($trasladoPendiente) {
            return response()->json($trasladoPendiente);
        } else {
            return response()->json(['error' => 'No se encontro el traslado pendiente'], 404);
        }
    }
    public function realizarTransferenciaBobeda(Request $request)
    {
        $cajaEnvia = Cajas::findOrFail($request->id_caja);
        //crear el movimiento de traslado en movimientos
        $movimiento = new Movimientos();
        $movimiento->id_cuenta = 0;
        $movimiento->tipo_operacion = 4;
        $movimiento->monto = $request->monto;
        $movimiento->fecha_operacion = now();
        $movimiento->cajero_operacion = session()->get('id_empleado_usuario');
        $movimiento->id_caja = $request->id_caja;
        $movimiento->estado = 0;
        $movimiento->save();
        //actualizar el saldo de la caja que envia el traslado
        $cajaEnvia->saldo = $cajaEnvia->saldo - $request->monto;
        $cajaEnvia->save();
        //crear el movimiento de traslado en bobeda_movimientos
        // $traslado = new BobedaMovimientos();
        // $traslado->id_caja = $request->id_caja;
        // $traslado->id_caja_destino = $request->id_caja_destino;
        // $traslado->monto = $request->monto;
        // $traslado->estado = 1;
        // $traslado->save();
        return redirect("/reportes/comprobanteMovimiento/" . $movimiento->id_movimiento);


    }

    public function recibirTraslado(Request $request)
    {

        $cajaReibe = Cajas::findOrFail($request->id_caja);
        $movimiento = new Movimientos();
        $movimiento->id_cuenta = 0;
        $movimiento->tipo_operacion = 3;
        $movimiento->monto = $request->monto;
        $movimiento->fecha_operacion = now();
        $movimiento->cajero_operacion = session()->get('id_empleado_usuario');
        $movimiento->id_caja = $request->id_caja;
        $movimiento->observacion = "Recibe traslado de Bobeda";
        $movimiento->cliente_transaccion = $request->cliente_transaccion;
        $movimiento->estado = 3;
        $movimiento->save();
        $cajaReibe->saldo = $cajaReibe->saldo + $request->monto;
        $cajaReibe->save();
        //actualizamos el estado del traslado
        $traslado = BobedaMovimientos::findOrFail($request->id_bobeda_movimiento);
        $traslado->estado = 2;
        $traslado->save();
        return redirect("/reportes/comprobanteMovimiento/" . $movimiento->id_movimiento);



    }

    public function realizardeposito(Request $request)
    {
        $caja = Cajas::findOrFail($request->id_caja);
        $id_cuenta_destino = $request->id_cuenta;
        $cuentaDestinoDatos = Cuentas::findOrFail($id_cuenta_destino);
        $movimiento = new Movimientos();
        $movimiento->id_cuenta = $request->id_cuenta;
        $movimiento->tipo_operacion = 1;
        $movimiento->monto = $request->monto;
        $movimiento->fecha_operacion = now();
        $movimiento->cajero_operacion = session()->get('id_empleado_usuario');
        $movimiento->id_caja = $request->id_caja;
        $movimiento->dui_transaccion = $request->dui_transaccion;
        $movimiento->cliente_transaccion = $request->cliente_transaccion;
        $movimiento->estado = 1;
        $movimiento->save();
        $cuentaDestinoDatos->saldo_cuenta = $cuentaDestinoDatos->saldo_cuenta + $request->monto;
        $cuentaDestinoDatos->save();
        $caja->saldo = $caja->saldo + $request->monto;
        $caja->save();

        //Generar la partida contable 
        $configuracion = Configuracion::first();
        $id_partida = Str::uuid()->toString();
        $partidaContable = new PartidaContable;



        $cuentaDatos = Cuentas::join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->where('cuentas.id_cuenta', '=', $request->id_cuenta)
            ->whereNotIn('clientes.estado', [0, 7])
            ->distinct()
            ->orderby('cuentas.created_at', 'desc')
            ->select('cuentas.*', 'clientes.nombre as nombre_cliente', 'clientes.dui_cliente as dui_cliente', 'tipos_cuentas.descripcion_cuenta as tipo_cuenta')
            ->first();

        $descripcionPartida = $cuentaDatos->tipo_cuenta . ' ' . $cuentaDatos->nombre_cliente;

        $partidaContable->concepto = 'POR DEPOSITO A CUENTA DE ' . $descripcionPartida;
        $partidaContable->tipo_partida = 1; //Partida Diaria
        $partidaContable->id_partida_contable = $id_partida;
        $yearContableMax = $configuracion->max('year_contable');
        $numero_cuenta = PartidaContable::where('year_contable', $yearContableMax)->max('num_partida');

        $partidaContable->num_partida = $numero_cuenta + 1;
        $partidaContable->year_contable = date('Y');
        $partidaContable->fecha_partida = today();
        $partidaContable->save();


        $arrayDatos = [];
        $arrayDatos[] = ['cuenta' => $configuracion->deposito_cuenta_debe, 'debe' => $request->monto, 'haber' => 0];
        $arrayDatos[] = ['cuenta' => $configuracion->deposito_cuenta_haber, 'debe' => 0, 'haber' => $request->monto];



        foreach ($arrayDatos as $item) {
            $detallePartida = new PartidaContableDetalleModel();
            $detallePartida->id_cuenta = $item['cuenta'];
            $detallePartida->id_partida = $id_partida;
            if ($item['debe'] > 0) {
                $detallePartida->parcial = $item['debe'];
                //Sumar al saldo de la cuenta
                $cuenta = Catalogo::find($item['cuenta']);
                $cuenta->saldo = $cuenta->saldo + $item['debe'];
                $cuenta->save();

            }
            if ($item['haber'] > 0) {
                $detallePartida->parcial = $item['haber'];
                //Restar al saldo de la cuenta
                $cuenta = Catalogo::find($item['cuenta']);
                $cuenta->saldo = $cuenta->saldo - $item['haber'];
                $cuenta->save();
            }
            $detallePartida->cargos = $item['debe'];
            $detallePartida->abonos = $item['haber'];
            $detallePartida->estado = 0; //Pendiente de procesar la partida
            $detallePartida->save();
        }



        return redirect("/reportes/comprobanteMovimiento/" . $movimiento->id_movimiento);


    }

    public function realizarretiro(Request $request)
    {
        $caja = Cajas::findOrFail($request->id_caja);

        $id_cuenta_origen = $request->id_cuenta;
        $cuentaOrigenDatos = Cuentas::findOrFail($id_cuenta_origen);
        $movimiento = new Movimientos();
        $movimiento->id_cuenta = $request->id_cuenta;
        $movimiento->tipo_operacion = 2;
        $movimiento->monto = $request->monto;
        $movimiento->fecha_operacion = now();
        $movimiento->cajero_operacion = session()->get('id_empleado_usuario');
        $movimiento->id_caja = $request->id_caja;
        $movimiento->estado = 1;
        $movimiento->dui_transaccion = $request->dui_transaccion;
        $movimiento->cliente_transaccion = $request->cliente_transaccion;
        $movimiento->save();
        $cuentaOrigenDatos->saldo_cuenta = $cuentaOrigenDatos->saldo_cuenta - $request->monto;
        $cuentaOrigenDatos->save();
        $caja->saldo = $caja->saldo - $request->monto;
        $caja->save();


        //Generar la partida contable 
        $configuracion = Configuracion::first();
        $id_partida = Str::uuid()->toString();
        $partidaContable = new PartidaContable;



        $cuentaDatos = Cuentas::join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->where('cuentas.id_cuenta', '=', $request->id_cuenta)
            ->whereNotIn('clientes.estado', [0, 7])
            ->distinct()
            ->orderby('cuentas.created_at', 'desc')
            ->select('cuentas.*', 'clientes.nombre as nombre_cliente', 'clientes.dui_cliente as dui_cliente', 'tipos_cuentas.descripcion_cuenta as tipo_cuenta')
            ->first();

        $descripcionPartida=$cuentaDatos->tipo_cuenta.' '.$cuentaDatos->nombre_cliente;

        $partidaContable->concepto = 'RETIRO DE LA CUENTA DE '.$descripcionPartida;
        $partidaContable->tipo_partida = 1; //Partida Diaria
        $partidaContable->id_partida_contable = $id_partida;
        $yearContableMax = $configuracion->max('year_contable');
        $numero_cuenta = PartidaContable::where('year_contable', $yearContableMax)->max('num_partida');

        $partidaContable->num_partida = $numero_cuenta + 1;
        $partidaContable->year_contable = date('Y');
        $partidaContable->fecha_partida = today();
        $partidaContable->save();


        $arrayDatos = [];
        $arrayDatos[] = ['cuenta' => $configuracion->retiro_cuenta_debe, 'debe' => $request->monto, 'haber' => 0];
        $arrayDatos[] = ['cuenta' => $configuracion->retiro_cuenta_haber, 'debe' => 0, 'haber' => $request->monto];



        foreach ($arrayDatos as $item) {
            $detallePartida = new PartidaContableDetalleModel();
            $detallePartida->id_cuenta = $item['cuenta'];
            $detallePartida->id_partida = $id_partida;
            if ($item['debe'] > 0) {
                $detallePartida->parcial = $item['debe'];
                //Sumar al saldo de la cuenta
                $cuenta = Catalogo::find($item['cuenta']);
                $cuenta->saldo = $cuenta->saldo + $item['debe'];
                $cuenta->save();

            }
            if ($item['haber'] > 0) {
                $detallePartida->parcial = $item['haber'];
                //Restar al saldo de la cuenta
                $cuenta = Catalogo::find($item['cuenta']);
                $cuenta->saldo = $cuenta->saldo - $item['haber'];
                $cuenta->save();
            }
            $detallePartida->cargos = $item['debe'];
            $detallePartida->abonos = $item['haber'];
            $detallePartida->estado = 0; //Pendiente de procesar la partida
            $detallePartida->save();
        }





        return redirect("/reportes/comprobanteMovimiento/" . $movimiento->id_movimiento);

    }


    public function anularmovimiento(Request $request)
    {
        $movimiento = Movimientos::findOrFail($request->id);
        $movimiento->estado = 0;
        $movimiento->save();
        $id_cuenta = $movimiento->id_cuenta;
        $id_caja = $movimiento->id_caja;
        $caja = Cajas::findOrFail($movimiento->id_caja);

        $cuenta = Cuentas::findOrFail($id_cuenta);
        if ($movimiento->tipo_operacion == 1) {
            $cuenta->saldo_cuenta = $cuenta->saldo_cuenta - $movimiento->monto; //Deposito
            $caja->saldo = $caja->saldo - $movimiento->monto;
            $caja->save();
        } else {
            $cuenta->saldo_cuenta = $cuenta->saldo_cuenta + $movimiento->monto; //Retiro
            $caja->saldo = $caja->saldo + $movimiento->monto;
            $caja->save();
        }
        $cuenta->save();

        return redirect("/movimientos");
    }
    public function solicitartransferencia($id)
    {
        $cajas = Cajas::find($id);
        return view('movimientos.solicitartransferencia', compact('cajas'));
    }

    public function transferenciaTercero($id)
    {
        $caja = Cajas::find($id);
        $aperturaCaja = $caja->id_caja;
        $cuentas = Cuentas::join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->select('cuentas.id_cuenta', 'clientes.nombre', 'tipos_cuentas.descripcion_cuenta', 'cuentas.numero_cuenta', 'cuentas.saldo_cuenta', 'clientes.dui_cliente')
            ->whereNotIn('clientes.estado', [0, 7])
            ->get();
        return view('movimientos.transferenciaTercero', compact('caja', 'cuentas', 'aperturaCaja'));
    }


    public function realizarTransferenciaTerceros(Request $request)
    {
        //obtener datos de la cuenta origen
        $cuentaOrigen = Cuentas::findOrFail($request->id_cuenta_origen);
        $cuentaDestino = Cuentas::findOrFail($request->id_cuenta_destino);

        //verificar si tiene el monto disponible para realizar la transferencia
        if ($cuentaOrigen->saldo_cuenta < $request->monto) {
            return response()->json([
                'success' => false,
                'error' => "No tiene saldo suficiente para realizar la transferencia"
            ]);
        } else {


            //registrar el movimiento de retiro en la cuenta origen
            $movimientoOrigen = new Movimientos();
            $movimientoOrigen->id_cuenta = $request->id_cuenta_origen;
            $movimientoOrigen->tipo_operacion = 2;
            $movimientoOrigen->id_cuenta_destino = $request->id_cuenta_destino;
            $movimientoOrigen->monto = $request->monto;
            $movimientoOrigen->fecha_operacion = now();
            $movimientoOrigen->cajero_operacion = session()->get('id_empleado_usuario');
            $movimientoOrigen->id_caja = $request->id_caja;
            $movimientoOrigen->estado = 1;
            $movimientoOrigen->dui_transaccion = $request->dui_transaccion;
            $movimientoOrigen->cliente_transaccion = $request->cliente_transaccion;
            $movimientoOrigen->save();

            //actualizar el saldo de la cuenta origen
            $cuentaOrigen->saldo_cuenta = $cuentaOrigen->saldo_cuenta - $request->monto;
            $cuentaOrigen->save();
            //realizar el movimiento de deposito en la cuenta destino
            $movimientoDestino = new Movimientos();
            $movimientoDestino->id_cuenta = $request->id_cuenta_destino;
            $movimientoDestino->tipo_operacion = 1;
            $movimientoDestino->monto = $request->monto;
            $movimientoDestino->fecha_operacion = now();
            $movimientoDestino->cajero_operacion = session()->get('id_empleado_usuario');
            $movimientoDestino->id_caja = $request->id_caja;
            $movimientoDestino->estado = 1;
            $movimientoDestino->dui_transaccion = $request->dui_transaccion;
            $movimientoDestino->cliente_transaccion = $request->cliente_transaccion;
            $movimientoDestino->id_cuenta_destino = $request->id_cuenta_origen;
            $movimientoDestino->save();
            //actualizar el saldo de la cuenta destino
            $cuentaDestino->saldo_cuenta = $cuentaDestino->saldo_cuenta + $request->monto;
            $cuentaDestino->save();
            return response()->json([
                'success' => true,
                'error' => "Transferencia realizada con exito",
                'id_transaccion' => $movimientoOrigen->id_movimiento
            ]);

        }



    }
}