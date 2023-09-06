<?php

namespace App\Http\Controllers;

use App\Models\Beneficiarios;
use App\Models\Cajas;
use App\Models\Catalogo;
use App\Models\Clientes;
use App\Models\Cuentas;
use App\Models\LiquidacionModel;
use App\Models\Movimientos;
use App\Models\PartidaContable;
use App\Models\PartidaContableDetalleModel;
use App\Models\Referencias;
use App\Models\SolicitudCredito;
use App\Models\Credito;
use App\Models\TipoGarantia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SolicitudCreditoController extends Controller
{
    //
    public function index()
    {
        $solicitudes = SolicitudCredito::join('clientes', 'clientes.id_cliente', '=', 'solicitud_credito.id_cliente')
            ->orderBy('solicitud_credito.fecha_solicitud')
            ->select(
                'solicitud_credito.*',
                'clientes.nombre'
            )->paginate(10);


        return view('creditos.solicitudes.index', compact('solicitudes'));
    }

    public function add()
    {
        Session::put("estadoMenuminimizado", "1");

        $clientes = Clientes::whereNotIn('estado', [0, 7])->get();
        $beneficiarios = Beneficiarios::all();
        $idSolicitud = Str::uuid()->toString();
        $referencias = Referencias::select(
            'id_referencia',
            'nombre',
            'parentesco',
            'dui',
            'lugar_trabajo'
        )->get();

        $destinoCredito = Catalogo::where('tipo_catalogo', '=', 1)
            ->where('descripcion', 'like', '%prestamo%')
            ->get();

        $tiposGarantia = TipoGarantia::all();

        return view(
            'creditos.solicitudes.add',
            compact(
                'clientes',
                'beneficiarios',
                'idSolicitud',
                'referencias',
                'destinoCredito',
                'tiposGarantia'
            )
        );
    }
    public function edit($id)
    {
        $solicitud = SolicitudCredito::where('id_solicitud', $id)->first();
        $clientes = Clientes::whereNotIn('estado', [0, 7])->get();
        $cliente = Clientes::where('id_cliente', $solicitud->id_cliente)->first();
        $referencias = Referencias::select(
            'id_referencia',
            'nombre',
            'parentesco',
            'dui',
            'lugar_trabajo'
        )->get();
        $destinoCredito = Catalogo::select('id_cuenta', 'descripcion', 'numero')->where('descripcion', 'like', '%prestamo%')
            ->get();

        $tiposGarantia = TipoGarantia::all();

        // dd($destinoCredito);


        return view(
            "creditos.solicitudes.edit",
            compact(
                "solicitud",
                "clientes",
                "referencias",
                "cliente",
                'destinoCredito',
                'tiposGarantia'
            )
        );
    }




    public function post(Request $request)
    {

        $solicitud = new SolicitudCredito();
        $solicitud->id_solicitud = $request->id_solicitud;
        $numeroSolicitud = SolicitudCredito::max('numero_solicitud');

        $solicitud->numero_solicitud = $numeroSolicitud + 1;
        $solicitud->id_cliente = $request->id_cliente;
        $solicitud->id_socio = null;
        $solicitud->monto_solicitado = $request->monto_solicitado;
        $solicitud->fecha_solicitud = $request->fecha_solicitud;
        $solicitud->plazo = $request->plazo;
        $solicitud->tasa = $request->tasa;
        $solicitud->cuota = $request->cuota;
        $solicitud->aportaciones = $request->aportaciones;
        $solicitud->seguro_deuda = $request->seguro_deuda;
        $solicitud->destino = $request->destino;
        $solicitud->tipo_garantia = $request->tipo_garantia;
        $solicitud->garantia = $request->garantia;
        $solicitud->id_conyugue = $request->id_conyugue;
        $solicitud->empresa_labora = $request->empresa_labora;
        $solicitud->sueldo_conyugue = $request->sueldo_conyugue;
        $solicitud->tiempo_laborando = $request->tiempo_laborando;
        $solicitud->sueldo = $request->sueldo;
        $solicitud->cargo = $request->cargo;
        $solicitud->telefono_trabajo = $request->telefono_trabajo;
        $solicitud->sueldo_solicitante = $request->sueldo_solicitante;
        $solicitud->comisiones = $request->comisiones;
        $solicitud->negocio_propio = $request->negocio_propio;
        $solicitud->otros_ingresos = $request->otros_ingresos;
        $solicitud->total_ingresos = $request->total_ingresos;
        $solicitud->gastos_vida = $request->gastos_vida;
        $solicitud->pagos_obligaciones = $request->pagos_obligaciones;
        $solicitud->gastos_negocios = $request->gastos_negocios;
        $solicitud->otros_gastos = $request->otros_gastos;
        $solicitud->total_gasto = $request->total_gasto;
        $solicitud->estado = 1; //Presentada
        $solicitud->save();

        return redirect('/creditos/solicitudes');
    }

    public function put(Request $request)
    {
        // dd($request->all());
        $solicitud = SolicitudCredito::where('id_solicitud', $request->id_solicitud)->first();
        $solicitud->id_solicitud = $request->id_solicitud;
        $solicitud->id_cliente = $request->id_cliente;
        $solicitud->id_socio = null;
        $solicitud->monto_solicitado = $request->monto_solicitado;
        $solicitud->fecha_solicitud = $request->fecha_solicitud;
        $solicitud->plazo = $request->plazo;
        $solicitud->tasa = $request->tasa;
        $solicitud->cuota = $request->cuota;
        $solicitud->aportaciones = $request->aportaciones;
        $solicitud->seguro_deuda = $request->seguro_deuda;
        $solicitud->destino = $request->destino;
        $solicitud->tipo_garantia = $request->tipo_garantia;
        $solicitud->garantia = $request->garantia;
        $solicitud->id_conyugue = $request->id_conyugue;
        $solicitud->empresa_labora = $request->empresa_labora;
        $solicitud->sueldo_conyugue = $request->sueldo_conyugue;
        $solicitud->tiempo_laborando = $request->tiempo_laborando;
        $solicitud->sueldo = $request->sueldo;
        $solicitud->cargo = $request->cargo;
        $solicitud->telefono_trabajo = $request->telefono_trabajo;
        $solicitud->sueldo_solicitante = $request->sueldo_solicitante;
        $solicitud->comisiones = $request->comisiones;
        $solicitud->negocio_propio = $request->negocio_propio;
        $solicitud->otros_ingresos = $request->otros_ingresos;
        $solicitud->total_ingresos = $request->total_ingresos;
        $solicitud->gastos_vida = $request->gastos_vida;
        $solicitud->pagos_obligaciones = $request->pagos_obligaciones;
        $solicitud->gastos_negocios = $request->gastos_negocios;
        $solicitud->otros_gastos = $request->otros_gastos;
        $solicitud->total_gasto = $request->total_gasto;
        $solicitud->estado = 1; //Presentada
        $solicitud->save();

        return redirect('/creditos/solicitudes');
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        SolicitudCredito::destroy($id);
        return redirect("creditos/solicitudes/");

    }





    public function estudios()
    {
        $solicitudes = SolicitudCredito::join('clientes', 'clientes.id_cliente', '=', 'solicitud_credito.id_cliente')
            ->orderBy('solicitud_credito.fecha_solicitud')
            ->select(
                'solicitud_credito.*',
                'clientes.nombre'
            )->paginate(10);


        return view('creditos.estudios.index', compact('solicitudes'));
    }

    public function desembolso($id)
    {
        $solicitud = SolicitudCredito::where('id_solicitud', $id)->first();
        $clientes = Clientes::whereNotIn('estado', [0, 7])->get();
        $cliente = Clientes::where('id_cliente', $solicitud->id_cliente)->first();
        $referencias = Referencias::select(
            'id_referencia',
            'nombre',
            'parentesco',
            'dui',
            'lugar_trabajo'
        )->get();
        $destinoCredito = Catalogo::where('tipo_catalogo', '=', 1)->get();
        $tiposCuenta = Catalogo::where('tipo_catalogo', '=', 2)->get();
        $ingresosPorAplicar = Catalogo::where('tipo_catalogo', '=', 3)->get();
        $seguroDescuentos = Catalogo::where('tipo_catalogo', '=', 4)->get();
        $desceuntosIVA = Catalogo::where('tipo_catalogo', '=', 5)->get();
        $descuentoDeAportaciones = Catalogo::where('tipo_catalogo', '=', 6)->get();
        $descuentoComisiones = Catalogo::where('tipo_catalogo', '=', 7)->get();
        $otrosDescuentos = Catalogo::where('tipo_catalogo', '=', 8)->get();




        $tiposGarantia = TipoGarantia::all();

        $cuentas = Cuentas::join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->select('cuentas.id_cuenta', 'cuentas.numero_cuenta', 'clientes.nombre', 'tipos_cuentas.descripcion_cuenta')
            ->where('clientes.id_cliente', '=', $solicitud->id_cliente)
            ->get();
        // dd($cuentas);

        return view(
            "creditos.solicitudes.desembolso",
            compact(
                "solicitud",
                "clientes",
                "referencias",
                "cliente",
                'destinoCredito',
                'tiposGarantia',
                'cuentas',
                'tiposCuenta',
                'ingresosPorAplicar',
                'seguroDescuentos',
                'desceuntosIVA',
                'descuentoDeAportaciones',
                'descuentoComisiones',
                'otrosDescuentos'
            )
        );
    }



    public function createCredit(Request $request)
    {
        $credito = new Credito();
        $solicitud = SolicitudCredito::where('id_solicitud', $request->id_solicitud)->first();
        $cliente = Clientes::where('id_cliente', $solicitud->id_cliente)->first();
        $solicitud->estado = 2;
        $solicitud->save();
        $credito->id_credito = Str::uuid()->toString();
        $credito->id_cliente = $solicitud->id_cliente;
        $credito->id_solicitud = $solicitud->id_solicitud;
        $credito->plazo = $solicitud->plazo;
        $credito->tasa = $solicitud->tasa;
        $credito->monto_solicitado = $solicitud->monto_solicitado;
        $credito->saldo_capital = $solicitud->monto_solicitado;
        $credito->cuota = $solicitud->cuota;
        $credito->aportaciones = $solicitud->aportaciones;
        $credito->seguro_deuda = $solicitud->seguro_deuda;
        $codCredito = $cliente->id_cliente . date("ymdHis") . $solicitud->numero_solicitud;
        $credito->codigo_credito = str_pad($codCredito, 20, "0", STR_PAD_LEFT);
        $credito->fecha_vencimiento = date('Y-m-d', strtotime("+" . $solicitud->plazo . " months", strtotime(date('Y-m-d'))));
        $credito->proxima_fecha_pago = date('Y-m-d', strtotime("+1 months", strtotime(date('Y-m-d'))));
        $credito->fecha_pago = date('Y-m-d');
        $credito->ultima_fecha_pago = date('Y-m-d');
        $credito->interes_mora = 36;
        $credito->liquido_recibido = 0;
        $credito->estado = 1;
        $credito->save();

        return redirect('/creditos/solicitudes');
    }

    public function liquidar(Request $request)
    {
        $id_credito = $request->id_credito;





        $id_empleado = session()->get('id_empleado_usuario');

        $id_cuenta_ahorro_destino = $request->id_cuenta_ahorro_destino;
        $id_cuenta_aportacion_destino = $request->id_cuenta_aportacion_destino;
        $aportacionMonto = $request->aportacionMonto;
        $credito = Credito::find($id_credito);
        $id_cliente = $credito->id_cliente;

        $credito->liquido_recibido = $request->liquido;
        $credito->estado = 2;
        $credito->empleado_liquido = $id_empleado;
        $credito->fecha_desembolso = now();
        $credito->id_cuenta_ahorro = $id_cuenta_ahorro_destino;
        $credito->id_cuenta_aportacion = $id_cuenta_aportacion_destino;
        $credito->aportacion_credito = $aportacionMonto;
        $credito->save();

        //hacer el deposito en la cuenta de ahorro
        $caja = Cajas::findOrFail($request->id_caja_aperturada);
        $id_cuenta_destino = $request->id_cuenta_ahorro_destino;
        $cuentaDestinoDatos = Cuentas::findOrFail($id_cuenta_destino);
        $movimiento = new Movimientos();
        $movimiento->id_cuenta = $id_cuenta_destino;
        $movimiento->tipo_operacion = 8; //Deposito liquido
        $movimiento->monto = $request->liquido;
        $movimiento->fecha_operacion = now();
        $movimiento->cajero_operacion = session()->get('id_empleado_usuario');
        $movimiento->id_caja = $request->id_caja_aperturada;
        $movimiento->dui_transaccion = '---------';
        $movimiento->cliente_transaccion = 'Caja por Desembolso de credito';
        $movimiento->estado = 1;
        $movimiento->save();
        $cuentaDestinoDatos->saldo_cuenta = $cuentaDestinoDatos->saldo_cuenta + $request->liquido;
        $cuentaDestinoDatos->save();
        $caja->saldo = $caja->saldo + $request->monto;
        $caja->save();



        //hacer el deposito en la cuenta de aporaciones
        $saldAportacionCuenta = Cuentas::findOrfail($id_cuenta_aportacion_destino);
        $aportacion = new Movimientos();
        $aportacion->id_cuenta = $id_cuenta_aportacion_destino;
        $aportacion->tipo_operacion = 9; //Deposito aportacion
        $aportacion->monto = $credito->aportaciones;
        $aportacion->fecha_operacion = now();
        $aportacion->cajero_operacion = session()->get('id_empleado_usuario');
        $aportacion->id_caja = $request->id_caja_aperturada;
        $aportacion->dui_transaccion = '---------';
        $aportacion->cliente_transaccion = 'Caja - Aportacion por Desembolso de credito';
        $aportacion->estado = 1;
        $aportacion->save();
        $saldAportacionCuenta->saldo_cuenta = $saldAportacionCuenta->saldo_cuenta + $aportacionMonto;
        $saldAportacionCuenta->save();


        //Generar la partida contable 
        $id_partida = Str::uuid()->toString();
        $partidaContable = new PartidaContable;
        $id_cliente = $cuentaDestinoDatos->id_cliente;
        $cliente = Clientes::find($id_cliente);
        $cliente_prestamo = "";
        if ($cliente) {
            $cliente_prestamo = $cliente->nombre;
        }



        $partidaContable->concepto = 'POR PRESTAMO OTORGADO A' . $cliente_prestamo;
        $partidaContable->tipo_partida = 1; //Partida Diaria
        $partidaContable->id_partida_contable = $id_partida;
        $numero_cuenta = PartidaContable::where('year_contable', '=', date('Y'))->max('num_partida');
        $partidaContable->num_partida = $numero_cuenta + 1;
        $partidaContable->year_contable = date('Y');
        $partidaContable->fecha_partida = today();
        $partidaContable->monto= $request->liquido;
        $partidaContable->save();

        //recorremos los detalles de la liquidaacion para asignarlos a la partida contable
        $detallesLiquidacion = LiquidacionModel::join('catalogo', 'catalogo.id_cuenta', 'liquidacion.id_cuenta')->where('id_credito', $id_credito)->get();

        foreach ($detallesLiquidacion as $liquidacion) {
            // generar los detalles de la partida contable
            $detallePartida = new PartidaContableDetalleModel();
            $detallePartida->id_cuenta = $liquidacion->id_cuenta;
            $detallePartida->id_partida = $id_partida;
            if ($liquidacion->monto_debe > 0) {
                $detallePartida->parcial = $liquidacion->monto_debe;
                //Sumar al saldo de la cuenta
                $cuenta = Catalogo::find($liquidacion->id_cuenta);
                $cuenta->saldo = $cuenta->saldo + $liquidacion->monto_debe;
                $cuenta->save();
                $padreActual = $cuenta->id_cuenta_padre;
                while ($padreActual !== null) {
                    $cuentaPadre = Catalogo::find($padreActual);
                    $cuentaPadre->saldo = $cuentaPadre->saldo + $liquidacion->monto_debe;
                    $cuentaPadre->save();
                    $padreActual = $cuentaPadre->id_cuenta_padre;
                }

            }
            if ($liquidacion->monto_haber > 0) {
                $detallePartida->parcial = $liquidacion->monto_haber;
                //Resta al saldo de la cuenta
                $cuenta = Catalogo::find($liquidacion->id_cuenta);
                $cuenta->saldo = $cuenta->saldo - $liquidacion->monto_haber;
                $cuenta->save();
                $padreActual = $cuenta->id_cuenta_padre;
                while ($padreActual !== null) {
                    $cuentaPadre = Catalogo::find($padreActual);
                    $cuentaPadre->saldo = $cuentaPadre->saldo - $liquidacion->monto_debe;
                    $cuentaPadre->save();
                    $padreActual = $cuentaPadre->id_cuenta_padre;
                }

            }
            $detallePartida->cargos = $liquidacion->monto_debe;
            $detallePartida->abonos = $liquidacion->monto_haber;
            $detallePartida->estado = 0; //Pendiente de procesar la partida
            $detallePartida->save();
        }






        return response()->json([
            'estado' => 'success',
            'success' => 'Credito liquidado con exito'
        ]);

    }

 
   

}