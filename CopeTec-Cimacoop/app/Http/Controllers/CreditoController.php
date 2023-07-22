<?php

namespace App\Http\Controllers;

use App\Models\Cajas;
use App\Models\Catalogo;
use App\Models\Configuracion;
use App\Models\Cuentas;
use App\Models\SolicitudCredito;
use Illuminate\Http\Request;
use App\Models\Credito;
use App\Models\PagosCredito;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CreditoController extends Controller
{
   function index(Request $request)
   {
      $creditosQuery = Credito::join('clientes', 'clientes.id_cliente', '=', 'creditos.id_cliente')
         ->where('creditos.estado', 2);
      if (isset($request->codigo_credito)) {
         $creditosQuery->where('creditos.codigo_credito', 'LIKE', '%' . $request->codigo_credito . '%');
      }
      if (isset($request->nombre_cliente)) {
         $creditosQuery->where('clientes.nombre', 'LIKE', '%' . $request->nombre_cliente . '%');
      }

      $creditos = $creditosQuery->paginate(10);

      return view('creditos.abonos.index', compact('creditos'));
   }

   function estudios(Request $request)
   {
      $creditosQuery = Credito::join('clientes', 'clientes.id_cliente', '=', 'creditos.id_cliente')
         ->where('creditos.estado', 1);
      if (isset($request->codigo_credito)) {
         $creditosQuery->where('creditos.codigo_credito', 'LIKE', '%' . $request->codigo_credito . '%');
      }
      if (isset($request->nombre_cliente)) {
         $creditosQuery->where('clientes.nombre', 'LIKE', '%' . $request->nombre_cliente . '%');
      }
      $creditos = $creditosQuery->paginate(10);
      return view('creditos.estudios.index', compact('creditos'));
   }

   function payment($id)
   {
      $id_empleado_usuario = Session::get('id_empleado_usuario');
      $cajaAperturada = Cajas::join('apertura_caja', 'apertura_caja.id_caja', '=', 'cajas.id_caja')
         ->where("estado_caja", '=', '1')
         ->where('id_usuario_asignado', '=', $id_empleado_usuario)
         ->select('cajas.id_caja', 'cajas.numero_caja')
         ->first();

      if (is_null($cajaAperturada)) {
         return redirect("/creditos/abonos")->withErrors('No tienes caja aperturada 😵‍💫, Asegurate de aperturar caja antes de intentar cobrar un crédito.');

      }


      $credito = Credito::where('id_credito', $id)->
         join('clientes', 'clientes.id_cliente', '=', 'creditos.id_cliente')->first();
      $configuracion = Configuracion::first();



      $pagos = PagosCredito::where('id_credito', $id)->get();

      $MORA = 0.000 * 0;

      $proxima_fecha_pago = date("Y-m-d");
      $ultima_proxima_fecha_pago = $credito->ultima_fecha_pago;

      $CUOTA = $credito->cuota;
      $APORTACION = $credito->aportaciones;
      $SEGURO_DEUDA = $credito->seguro_deuda;

      #calculo de intereses
      $SALDO_CAPITAL = $credito->saldo_capital;
      // $TASA = $credito->tasa / 100;
      $TASA = $configuracion->interes_moratorio / 100;

      $DIAS_TRASCURRIDOS = $this->diasEntreFechas($ultima_proxima_fecha_pago, $proxima_fecha_pago);
      $INTERESES = ($SALDO_CAPITAL * $TASA * $DIAS_TRASCURRIDOS) / 365;
      $INTERESES_30_DIAS = ($SALDO_CAPITAL * $TASA * 30) / 365;


      $CAPITAL = $CUOTA - $INTERESES;
      if ($CAPITAL < 0) {
         $CAPITAL = 0.0;
      }
      $DIAS_MORA = 0;
      if ($DIAS_TRASCURRIDOS > 33) {
         $TASA_MORA = $credito->interes_mora / 100;
         $CAPITAL_VENCIDO = $CUOTA - $INTERESES_30_DIAS;
         $DIAS_MORA = $DIAS_TRASCURRIDOS - 30;
         //dd($CAPITAL_VENCIDO);
         $MORA = ($CAPITAL_VENCIDO * $TASA_MORA * $DIAS_MORA) / 365;
      }

      $TOTAL_PAGAR = $CAPITAL + $MORA + $APORTACION + $SEGURO_DEUDA + $INTERESES;

      return view(
         'creditos.abonos.pago',
         compact(
            'credito',
            'pagos',
            'MORA',
            'INTERESES',
            'CAPITAL',
            'TOTAL_PAGAR',
            'DIAS_MORA',
            'TASA',
            'cajaAperturada',
         )
      );
   }

   function payCredit(Request $request)
   {
      $credito = Credito::where('id_credito', $request->id_credito)->first();
      $pago = new PagosCredito();
      $configuracion = Configuracion::first();

      $MORA = 0.000 * 0;

      $proxima_fecha_pago = $credito->proxima_fecha_pago;
      $ultima_proxima_fecha_pago = $credito->ultima_fecha_pago;

      $CUOTA = $credito->cuota;
      $APORTACION = $credito->aportaciones;
      $SEGURO_DEUDA = $credito->seguro_deuda;

      #calculo de intereses
      $SALDO_CAPITAL = $credito->saldo_capital;
      // $TASA = $credito->tasa / 100;
      $TASA = $configuracion->interes_moratorio / 100;

      $DIAS_TRASCURRIDOS = $this->diasEntreFechas($ultima_proxima_fecha_pago, $proxima_fecha_pago);
      $INTERESES = ($SALDO_CAPITAL * $TASA * $DIAS_TRASCURRIDOS) / 365;
      $INTERESES_30_DIAS = ($SALDO_CAPITAL * $TASA * 30) / 365;



      if ($DIAS_TRASCURRIDOS > 33) {
         // $TASA_MORA = $credito->interes_mora / 100;
         $TASA_MORA = $configuracion->interes_moratorio / 100;
         $CAPITAL_VENCIDO = $CUOTA - $INTERESES_30_DIAS;
         $DIAS_MORA = $DIAS_TRASCURRIDOS - 30;
         //dd($CAPITAL_VENCIDO);
         $MORA = ($CAPITAL_VENCIDO * $TASA_MORA * $DIAS_MORA) / 365;
      }

      $CAPITAL = $request->monto_saldo - $INTERESES - $MORA - $SEGURO_DEUDA - $APORTACION;
      if ($CAPITAL < 0) {
         $CAPITAL = 0.0;
      }

      $TOTAL_PAGAR = $CAPITAL + $MORA + $APORTACION + $SEGURO_DEUDA + $INTERESES;

      $credito->saldo_capital = $credito->saldo_capital - $CAPITAL;
      $credito->proxima_fecha_pago = date('Y-m-d', strtotime("+2 months", strtotime($credito->fecha_pago)));
      $credito->fecha_pago = date('Y-m-d', strtotime("+1 months", strtotime($credito->fecha_pago)));
      $credito->ultima_fecha_pago = date('Y-m-d');
      $credito->save();

      $pago->id_credito = $credito->id_credito;
      $pago->id_pago_credito = Str::uuid()->toString();
      $pago->capital = $CAPITAL;
      $pago->interes = $INTERESES;
      $pago->mora = $MORA;
      $pago->aportacion = $APORTACION;
      $pago->seguro_deuda = $SEGURO_DEUDA;
      $pago->total_pago = $TOTAL_PAGAR;
      $pago->fecha_pago = date('Y-m-d H:i:s');
      $pago->save();

      return redirect('/creditos/payment/' . $credito->id_credito);


   }

   function diasEntreFechas($fechainicio, $fechafin)
   {
      return ((strtotime($fechafin) - strtotime($fechainicio)) / 86400);
   }

   function liquidar($credito)
   {
      $id_empleado_usuario = Session::get('id_empleado_usuario');
      $cajaAperturada = Cajas::join('apertura_caja', 'apertura_caja.id_caja', '=', 'cajas.id_caja')
         ->where("estado_caja", '=', '1')
         ->where('id_usuario_asignado', '=', $id_empleado_usuario)
         ->select('cajas.id_caja', 'cajas.numero_caja')
         ->first();

      if (is_null($cajaAperturada)) {
         return redirect("/creditos/abonos")->withErrors('No tienes caja aperturada 😵‍💫, Asegurate de aperturar caja antes de intentar cobrar un crédito.');

      }


      $credito = Credito::where('id_credito', $credito)->
         join('clientes', 'clientes.id_cliente', '=', 'creditos.id_cliente')->first();
      $configuracion = Configuracion::first();
      $catalogo = Catalogo::all();
      $tipoCredito = Catalogo::where('tipo_catalogo', '=', 1)->get();

      $configuracion = Configuracion::first();
      $costoConsultaCrediticia = number_format($configuracion->costo_consulta_crediticia);


      $solicitud = SolicitudCredito::where('id_solicitud', $credito->id_solicitud)->first();
     


      $cuentas = Cuentas::join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
         ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
         ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
         ->select('cuentas.id_cuenta', 'cuentas.numero_cuenta', 'clientes.nombre', 'tipos_cuentas.descripcion_cuenta')
         ->where('clientes.id_cliente', '=', $credito->id_cliente)
         ->get();



      return view(
         'creditos.liquidar.index',
         compact(
            'credito',
            'cajaAperturada',
            'configuracion',
            'catalogo',
            'cuentas',
            'tipoCredito',
            'solicitud',
            'costoConsultaCrediticia'
         )
      );
   }
}