<?php

namespace App\Http\Controllers;

use App\Models\Cajas;
use App\Models\Catalogo;
use App\Models\Clientes;
use App\Models\Configuracion;
use App\Models\Cuentas;
use App\Models\LiquidacionModel;
use App\Models\Movimientos;
use App\Models\Parameter;
use App\Models\PartidaContable;
use App\Models\PartidaContableDetalleModel;
use App\Models\SolicitudCredito;
use Illuminate\Http\Request;
use App\Models\Credito;
use App\Models\PagosCredito;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use \PDF;

class CreditoController extends Controller
{
<<<<<<< HEAD

   private $estilos;
   private $stilosBundle;
   private $mesesEnLetras = [];
=======
   private $estilos;
   private $stilosBundle;

>>>>>>> ed152f65fb1cbf7ef9208385b33f218331120b65
   public function __construct()
   {
      $this->estilos = file_get_contents(public_path('assets/css/css.css'));
      $this->stilosBundle = file_get_contents(public_path('assets/css/style.bundle.css'));
<<<<<<< HEAD
      $this->mesesEnLetras = [
         1 => 'Enero',
         2 => 'Febrero',
         3 => 'Marzo',
         4 => 'Abril',
         5 => 'Mayo',
         6 => 'Junio',
         7 => 'Julio',
         8 => 'Agosto',
         9 => 'Septiembre',
         10 => 'Octubre',
         11 => 'Noviembre',
         12 => 'Diciembre'
      ];
=======

>>>>>>> ed152f65fb1cbf7ef9208385b33f218331120b65
   }
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
      Session::put("estadoMenuminimizado", "1");
      $param = Parameter::all();
      $id_empleado_usuario = Session::get('id_empleado_usuario');
      $cajaAperturada = Cajas::join('apertura_caja', 'apertura_caja.id_caja', '=', 'cajas.id_caja')
         ->where("estado_caja", '=', '1')
         ->where('id_usuario_asignado', '=', $id_empleado_usuario)
         ->select('cajas.id_caja', 'cajas.numero_caja')
         ->first();

      if (is_null($cajaAperturada)) {
         return redirect("/creditos/abonos")->withErrors('No tienes caja aperturada 😵‍💫, Asegurate de aperturar caja antes de intentar cobrar un crédito.');
      }


      $credito = Credito::where('id_credito', $id)->join('clientes', 'clientes.id_cliente', '=', 'creditos.id_cliente')->first();
      $configuracion = Configuracion::first();



      $pagos = PagosCredito::join('cajas', 'cajas.id_caja', '=', 'pagos_credito.id_caja')->where('id_credito', $id)->orderBy('fecha_pago', 'desc')->get();


      $MORA = 0.000 * 0;

      $proxima_fecha_pago = date("Y-m-d");
      $ultima_proxima_fecha_pago = $credito->ultima_fecha_pago;

      $CUOTA = $credito->cuota;
      $APORTACION = $credito->aportaciones;
      $SEGURO_DEUDA = $credito->seguro_deuda;

      #calculo de intereses
      // $SALDO_CAPITAL = number_format( $credito->saldo_capital);
      $SALDO_CAPITAL = sprintf("%.2f", $credito->saldo_capital);

      // $TASA = $credito->tasa / 100;
      $TASA = $configuracion->interes_moratorio / 100;

      // $DIAS_TRASCURRIDOS = $this->diasEntreFechas($ultima_proxima_fecha_pago, $proxima_fecha_pago);
      $DIAS_TRASCURRIDOS = $this->diasEntreFechas($ultima_proxima_fecha_pago, $proxima_fecha_pago);
      if ($DIAS_TRASCURRIDOS < 0) {
         $DIAS_TRASCURRIDOS = 0;
      }

      $INTERESES = ($SALDO_CAPITAL * $TASA * $DIAS_TRASCURRIDOS) / 365;
      $INTERESES = sprintf("%.2f", $INTERESES);
      $INTERESES_30_DIAS = ($SALDO_CAPITAL * $TASA * 30) / 365;
      $INTERESES_30_DIAS == sprintf("%.2f", $INTERESES_30_DIAS);


      if ($CUOTA > $SALDO_CAPITAL) { //Si la cuota es mayor al saldo capital se le asigna el saldo capital
         $CUOTA = $SALDO_CAPITAL;
      }

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
            'param'
         )
      );
   }

   function payCredit(Request $request)
   {
      $configuracion = Configuracion::first();




      $credito = Credito::where('id_credito', $request->id_credito)->first();

      $MORA = 0.000 * 0;

      // $proxima_fecha_pago = $credito->proxima_fecha_pago;
      $proxima_fecha_pago = date("Y-m-d");
      $ultima_proxima_fecha_pago = $credito->ultima_fecha_pago;

      $CUOTA = $credito->cuota;
      $APORTACION = $credito->aportaciones;
      // dd($credito);
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
         $MORA = sprintf("%.2f", ($CAPITAL_VENCIDO * $TASA_MORA * $DIAS_MORA) / 365);
      }

      $CAPITAL = sprintf("%.2f", $request->monto_saldo - $INTERESES - $MORA - $SEGURO_DEUDA - $APORTACION);
      if ($CAPITAL < 0) {
         $CAPITAL = 0.0;
      }

      $TOTAL_PAGAR = $CAPITAL + $MORA + $APORTACION + $SEGURO_DEUDA + $INTERESES;

      $credito->saldo_capital = $credito->saldo_capital - $CAPITAL;
      $credito->proxima_fecha_pago = date('Y-m-d', strtotime("+2 months", strtotime($credito->fecha_pago)));
      $credito->fecha_pago = date('Y-m-d', strtotime("+1 months", strtotime($credito->fecha_pago)));
      $credito->ultima_fecha_pago = date('Y-m-d');
      $credito->save();

      $pago = new PagosCredito();
      $pago->id_credito = $credito->id_credito;
      $pago->id_pago_credito = Str::uuid()->toString();
      $pago->capital = $CAPITAL;
      $pago->interes = $INTERESES;
      $pago->mora = $MORA;
      $pago->aportacion = ($APORTACION == null ? 0 : $APORTACION);
      $pago->seguro_deuda = ($SEGURO_DEUDA == null ? 0 : $SEGURO_DEUDA);
      $pago->total_pago = $TOTAL_PAGAR;
      $pago->fecha_pago = date('Y-m-d H:i:s');
      $pago->cliente_operacion = $request->cliente_operacion;
      $pago->dui_operacion = $request->dui_operacion;
      $pago->id_caja = $request->id_caja;
      $pago->save();




      //Registrando el movimiento en la caja del Abono al credito
      $cajaRecibe = Cajas::findOrFail($request->id_caja);
      $movimiento = new Movimientos();
      $movimiento->id_cuenta = 0;
      $movimiento->tipo_operacion = 7; //Abono a credito
      $movimiento->monto = ($TOTAL_PAGAR - $APORTACION);
      $movimiento->fecha_operacion = now();
      $movimiento->cajero_operacion = session()->get('id_empleado_usuario');
      $movimiento->id_caja = $request->id_caja;
      $movimiento->observacion = "Abono credito";
      $movimiento->cliente_transaccion = $request->cliente_operacion;
      $movimiento->dui_transaccion = $request->dui_operacion;
      $movimiento->estado = 1;
      $movimiento->id_pago_credito = $pago->id_pago_credito;
      $movimiento->save();
      //Actualizando el saldo de la caja
      $cajaRecibe->saldo = $cajaRecibe->saldo + ($TOTAL_PAGAR - $APORTACION);
      $cajaRecibe->save();

      //Registrando el movimiento en la cuenta de APortaciones del cliente
      $aportacion = new Movimientos();
      $aportacion->id_cuenta = $credito->id_cuenta_aportacion;
      $aportacion->tipo_operacion = 9;
      $aportacion->monto = $APORTACION;
      $aportacion->fecha_operacion = now();
      $aportacion->cajero_operacion = session()->get('id_empleado_usuario');
      $aportacion->id_caja = $request->id_caja;
      $aportacion->observacion = "Aportación crédito";
      $aportacion->cliente_transaccion = $request->cliente_operacion;
      $aportacion->dui_transaccion = $request->dui_operacion;
      $aportacion->estado = 1;
      $aportacion->id_pago_credito = $pago->id_pago_credito;
      $aportacion->save();

      //generar la partida contable del Deposito del credito
      $id_solicitud = $credito->id_solicitud;
      $solicitud = SolicitudCredito::where('id_solicitud', $id_solicitud)->first();



      //Generar la partida contable
      $id_partida = Str::uuid()->toString();
      $partidaContable = new PartidaContable;
      $cliente = Clientes::find($solicitud->id_cliente);



      $partidaContable->concepto = 'POR PAGO DE CUOTA A PRESTAMO ' . $cliente->nombre;
      $partidaContable->tipo_partida = 1; //Partida Diaria
      $partidaContable->id_partida_contable = $id_partida;
      $numero_cuenta = PartidaContable::where('year_contable', '=', date('Y'))->max('num_partida');
      $partidaContable->num_partida = $numero_cuenta + 1;
      $partidaContable->year_contable = date('Y');
      $partidaContable->fecha_partida = today();
      $partidaContable->save();


      $arrayDatos = [];
      $arrayDatos[] = ['cuenta' => $configuracion->monto_deposito_credito, 'debe' => $TOTAL_PAGAR, 'haber' => 0];


      if ($CAPITAL > 0) {
         $arrayDatos[] = ['cuenta' => $solicitud->destino, 'debe' => 0, 'haber' => $CAPITAL];
      }

      if ($APORTACION > 0) {
         $arrayDatos[] = ['cuenta' => $configuracion->cuenta_aportacion, 'debe' => 0, 'haber' => $APORTACION];
      }

      if ($INTERESES > 0) {
         $arrayDatos[] = ['cuenta' => $configuracion->cuenta_interes_credito, 'debe' => 0, 'haber' => $INTERESES];
      }
      // if ($SEGURO_DEUDA > 0) {
      //    $arrayDatos[] = ['cuenta' => $configuracion->cuenta_seguro_deuda, 'debe' => 0, 'haber' => $SEGURO_DEUDA];
      // }
      if ($MORA > 0) {
         $arrayDatos[] = ['cuenta' => $configuracion->cuenta_interes_credito_moratorio, 'debe' => 0, 'haber' => $MORA];
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
         $detallePartida->estado = 2; //Pendiente de procesar la partida
         $detallePartida->save();
      }
      return redirect("/reportes/comprobanteAbono/" . $pago->id_pago_credito);

   }


   function diasEntreFechas($fechainicio, $fechafin)
   {
      return ((strtotime($fechafin) - strtotime($fechainicio)) / 86400);
   }

   function liquidar($credito)
   {
      Session::put("estadoMenuminimizado", "1");

      $id_empleado_usuario = Session::get('id_empleado_usuario');
      $cajaAperturada = Cajas::join('apertura_caja', 'apertura_caja.id_caja', '=', 'cajas.id_caja')
         ->where("estado_caja", '=', '1')
         ->where('id_usuario_asignado', '=', $id_empleado_usuario)
         ->select('cajas.id_caja', 'cajas.numero_caja')
         ->first();

      if (is_null($cajaAperturada)) {
         return redirect("/creditos/abonos")->withErrors('No tienes caja aperturada 😵‍💫, Asegurate de aperturar caja antes de intentar cobrar un crédito.');
      }


      $credito = Credito::where('id_credito', $credito)->join('clientes', 'clientes.id_cliente', '=', 'creditos.id_cliente')->first();
      $configuracion = Configuracion::first();
      $catalogo = Catalogo::where('estado', '=', 1)->get();

      // $tipoCredito = Catalogo::where('tipo_catalogo', '=', 1)->get();
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
            // 'tipoCredito',
            'solicitud',
            'costoConsultaCrediticia',
         )
      );
   }
<<<<<<< HEAD
   // cred_canc func
   public function cred_canc()
   {
      return view('creditos.reportes.creditos_cancelados');
   }
   public function cred_canc_rep(Request $request)
   {
      $fechaDesde = $request->desde;
      $fechaHasta = $request->hasta;
      
      $creditos = Credito::whereBetween('updated_at', [$fechaDesde, $fechaHasta])->where('saldo_capital', '=', 0)->get();
      // dd($creditos);
      $pdf = PDF::loadView("creditos.reportes.cred_canc_rep", [
         'estilos' => $this->estilos,
         'stilosBundle' => $this->stilosBundle,
         'creditos' => $creditos,
         'desde' => $request->desde,         
         'hasta' => $request->hasta,

      ]);
      return $pdf->setOrientation('portrait')->inline();
=======

   public function desembolsosReporte(Request $request)
   {
      $desde=$request->desde;
      $hasta=$request->hasta;
      //cargar los creditos desembolsados
      $creditosQuery = Credito::join('clientes', 'clientes.id_cliente', '=', 'creditos.id_cliente')
         ->where('creditos.estado', 2);
         
      if (isset($request->desde, $request->hasta)) {
         $creditosQuery->whereRaw(' fecha_desembolso between ? and ?',[$desde, $hasta]);
      }
      
      $creditos = $creditosQuery->orderBy('fecha_desembolso','desc')->paginate(10);

      return view('creditos.desembolsos.index', compact('creditos'));

   }

   public function desembolsosRep($desde,$hasta){
      

      $desembolsos = Credito::join('clientes', 'clientes.id_cliente', '=', 'creditos.id_cliente')
         ->where('creditos.estado', 2)
         ->whereRaw('fecha_desembolso between ? and ?', [$desde, $hasta])
         ->orderBy('fecha_desembolso', 'desc')
         ->get();


      $pdf = PDF::loadView('creditos.desembolsos.desembolsos_rep', [
         'estilos' => $this->estilos,
         'stilosBundle' => $this->stilosBundle,
         'desembolsos' => $desembolsos,
         'desde' => $desde,
         'hasta' => $hasta,
      ]);
      return $pdf->setOrientation('portrait')->inline();
    
>>>>>>> ed152f65fb1cbf7ef9208385b33f218331120b65
   }
}
