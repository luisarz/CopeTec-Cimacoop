<?php

namespace App\Http\Controllers;

use App\Models\Asociados;
use App\Models\Cajas;
use App\Models\Catalogo;
use App\Models\Clientes;
use App\Models\Cuentas;
use App\Models\DepositosPlazo;
use App\Models\Movimientos;
use App\Models\PartidaContable;
use App\Models\PartidaContableDetalleModel;
use App\Models\Plazos;
use App\Models\TasasPlazos;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

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

        $id_empleado_usuario = session()->get('id_empleado_usuario');
        $cajaAperturada = Cajas::join('apertura_caja', 'apertura_caja.id_caja', '=', 'cajas.id_caja')
            ->where("estado_caja", '=', '1')
            ->where('id_usuario_asignado', '=', $id_empleado_usuario)
            ->select('cajas.id_caja', 'cajas.saldo', 'cajas.numero_caja', 'cajas.id_usuario_asignado', 'apertura_caja.monto_apertura', 'apertura_caja.fecha_apertura')
            ->first();
        if (is_null($cajaAperturada)) {
            return redirect("/apertura")->withErrors('No tienes caja aperturada, te redirigimos aqui, para que puedas aperturala y poder realizar movimientos.');

        }

        //pasar la cuenta contable de la cuenta de ahorro
        $CUENTA_CONTABLE = Catalogo::where('descripcion', 'like', '%DEPOSITO%')->get();

        return view('captaciones.depositosplazo.add', compact(
            'asociados',
            'plazos',
            'fecha',
            'certificado',
            'CUENTA_CONTABLE',
            'cajaAperturada'
        )
        );
    }
    public function post(Request $request)
    {
        // dd($request->all());

        //Obtener los datos del asociado y cliente
        $asociado = Asociados::join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->where('asociados.id_asociado', '=', $request->id_asociado)->first();


// dd($asociado);

        $deposito = new DepositosPlazo();
        $deposito->numero_certificado = $request->numero_certificado;
        $deposito->id_asociado = $request->id_asociado;
        $deposito->monto_deposito = $request->monto_deposito;
        $deposito->monto_total = $request->monto_total;
        $deposito->forma_deposito = $request->forma_deposito;
        $deposito->numero_cheque = $request->numero_cheque;
        $deposito->id_cuenta_depositar = $request->id_cuenta_depositar;
        $deposito->id_cuenta_aportacion = $request->id_cuenta_aportacion ? $request->id_cuenta_aportacion : null;
        $deposito->interes_deposito = $request->interes_deposito;
        $deposito->plazo_deposito = $request->plazo_deposito;
        $deposito->fecha_deposito = $request->fecha_deposito;
        $deposito->fecha_vencimiento = $request->fecha_vencimiento;
        $deposito->forma_pago_interes = $request->forma_pago_interes;
        $fechaVencimiento = Carbon::parse($request->fecha_vencimiento);
        $deposito->fecha_activacion_automatica = $fechaVencimiento->addDays(5);
        $deposito->is_renoved = 0;
        $deposito->monto_aportacion_cuenta = $request->monto_aportacion_cuenta;
        $deposito->monto_comision = $request->monto_comision;
        $deposito->monto_apertura_cuenta = $request->monto_apertura_cuenta;
        $deposito->interes_total = $request->interes_total;
        $deposito->interes_mensual = $request->interes_mensual;
        $deposito->id_cuenta_tipodeposito = $request->id_cuenta_tipodeposito; //Cuenta contable de deposito a plazo fijo
        $deposito->id_cuenta_depositar_aportaciones = $request->id_cuenta_depositar_aportaciones;

        $deposito->estado = 1;
        $deposito->save();

        //registrar el movimiento de deposito
        $movimiento = new Movimientos();
        $movimiento->id_cuenta = 0;// $request->id_cuenta_depositar;
        $movimiento->tipo_operacion = 10;
        // $movimiento->monto = $request->monto_total; --Monto Total
        $movimiento->monto = $request->monto_deposito; //Monto  real depositado QUitando Comisiones y aportaciones

        $movimiento->fecha_operacion = now();
        $movimiento->cajero_operacion = session()->get('id_empleado_usuario');
        $movimiento->id_caja = $request->id_caja;
        $movimiento->observacion = 'DEPOSITO A PLAZO FIJO # ' . $request->numero_certificado;
        $movimiento->dui_transaccion =$asociado->dui_cliente; //Obtener los datos del cliente
        $movimiento->cliente_transaccion= $asociado->nombre;
        $movimiento->estado = 1;
        $movimiento->save();

        //registrar el movimiento de aportacion
        if ($request->id_cuenta_depositar_aportaciones) {
            $movimiento = new Movimientos();
            $movimiento->id_cuenta = $request->id_cuenta_depositar_aportaciones;
            $movimiento->tipo_operacion = 1;
            $movimiento->monto = $request->monto_aportacion_cuenta;
            $movimiento->cajero_operacion = session()->get('id_empleado_usuario');
            $movimiento->id_caja = $request->id_caja;
            $movimiento->fecha_operacion = now();
            $movimiento->dui_transaccion = $asociado->dui_cliente; //Obtener los datos del cliente
            $movimiento->cliente_transaccion = $asociado->nombre;
            $movimiento->observacion = 'Deposito A CUENTA DE Aportaciones';
            $movimiento->estado = 1;

            $movimiento->save();
        }

        //registrar las partidas contables

        //Generar la partida contable 
        $id_partida = Str::uuid()->toString();
        $partidaContable = new PartidaContable;
        $cliente =Asociados::join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
        ->where('asociados.id_asociado', '=', $request->id_asociado)->first();




        $partidaContable->concepto = 'POR DEPOSITO A PLAZO - ' . $cliente->nombre;
        $partidaContable->tipo_partida = 1; //Partida Diaria
        $partidaContable->id_partida_contable = $id_partida;
        $numero_cuenta = PartidaContable::where('year_contable', '=', date('Y'))->max('num_partida');
        $partidaContable->num_partida = $numero_cuenta + 1;
        $partidaContable->year_contable = date('Y');
        $partidaContable->fecha_partida = today();
        $partidaContable->save();


        $arrayDatos = [];
        //Caja general - deposito total
        //11010101
        $arrayDatos[] = ['cuenta' => '5', 'debe' => $request->monto_total, 'haber' => 0];
       
        // DEPÓSITOS DE ASOCIADOS apertura de cuenta $5
        if ($request->monto_apertura_cuenta > 0) {
            //21010101
            $arrayDatos[] = ['cuenta' => '288', 'debe' => 0, 'haber' => $request->monto_apertura_cuenta];
        }

        //Deposito a plazo Asociado (deposito total-descuentos) = liquido
        $arrayDatos[] = ['cuenta' => $request->id_cuenta_tipodeposito, 'debe' => 0, 'haber' => $request->monto_deposito];


        //APORTACIONES PAGADAS  $10
        if ($request->monto_aportacion_cuenta > 0) {
            //310101
            $arrayDatos[] = ['cuenta' => '460', 'debe' => 0, 'haber' => $request->monto_aportacion_cuenta];
        }

        //OTRAS comision $10
        if ($request->monto_comision > 0) {
            //41010206
            $arrayDatos[] = ['cuenta' => '501', 'debe' => 0, 'haber' => $request->monto_comision];
        }
            
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
                $padreActual = $cuenta->id_cuenta_padre;
                while ($padreActual !== null) {
                    $cuentaPadre = Catalogo::find($padreActual);
                    $cuentaPadre->saldo = $cuentaPadre->saldo + $item['debe'];
                    $cuentaPadre->save();
                    $padreActual = $cuentaPadre->id_cuenta_padre;
                }

            }
            if ($item['haber'] > 0) {
                $detallePartida->parcial = $item['haber'];
                //Restar al saldo de la cuenta
                $cuenta = Catalogo::find($item['cuenta']);
                $cuenta->saldo = $cuenta->saldo - $item['haber'];
                $cuenta->save();
                $padreActual = $cuenta->id_cuenta_padre;
                while ($padreActual !== null) {
                    $cuentaPadre = Catalogo::find($padreActual);
                    $cuentaPadre->saldo = $cuentaPadre->saldo - $item['haber'];
                    $cuentaPadre->save();
                    $padreActual = $cuentaPadre->id_cuenta_padre;
                }
            }
            $detallePartida->cargos = $item['debe'];
            $detallePartida->abonos = $item['haber'];
            $detallePartida->estado = 1; // 0- Pendiente de procesar la partida 1-partida Procesada
            $detallePartida->save();
        }



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
        $tasas = TasasPlazos::where('id_plazo', '=', $deposito->plazo_deposito)->get();


        return view('captaciones.depositosplazo.edit', compact('deposito', 'asociados', 'plazos', 'cuentas', 'tasas'));

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

    public function delete(Request $request)
    {
        $id_deposito = $request->id;
        $deposito = DepositosPlazo::findorfail($id_deposito);
        $deposito->estado = 0;
        $deposito->save();
        return redirect('/captaciones/depositosplazo');
    }



}