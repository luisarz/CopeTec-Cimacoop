<?php

namespace App\Http\Controllers;

use App\Models\BeneficiarosDepositos;
use App\Models\Bobeda;
use App\Models\BobedaMovimientos;
use App\Models\Catalogo;
use App\Models\ClientCreditScore;
use App\Models\Clientes;
use App\Models\Configuracion;
use App\Models\Credito;
use App\Models\Cuentas;
use App\Models\DepositosPlazo;
use App\Models\Empleados;
use App\Models\LiquidacionModel;
use App\Models\Movimientos;
use App\Models\PagosCredito;
use App\Models\PartidasContablesModel;
use App\Models\ReferenciaSolicitud;
use App\Models\SolicitudCredito;
use App\Models\SolicitudCreditoBienes;
use App\Models\TipoGarantia;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Luecano\NumeroALetras\NumeroALetras;
use \PDF;
use App\Exports\CreditScoreExport;
use Maatwebsite\Excel\Facades\Excel;
use function MongoDB\BSON\toJSON;


class ReportesController extends Controller
{
    private $estilos;
    private $stilosBundle;

    public function __construct()
    {
        $this->estilos = file_get_contents(public_path('assets/css/css.css'));
        $this->stilosBundle = file_get_contents(public_path('assets/css/style.bundle.css'));
    }


    public function RepMovimientosBobeda($id)
    {

        $today = Carbon::today();
        $bobeda = Bobeda::first();

        $movimientoBobeda = BobedaMovimientos::join('cajas', 'cajas.id_caja', 'bobeda_movimientos.id_caja')
            ->where('bobeda_movimientos.fecha_operacion', '>=', $today)
            ->orderBy('bobeda_movimientos.id_bobeda_movimiento', 'asc')
            ->paginate(10);


        $currentDateTime = Carbon::today();
        // Check the data returned by the query
        $aperturaCaja = BobedaMovimientos::where('tipo_operacion', 3)
            ->whereDate('fecha_operacion', '>=', $currentDateTime)
            ->select('monto', 'fecha_operacion')
            ->first();


        $trasladoACaja = BobedaMovimientos::where('tipo_operacion', '1')
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');
        $recibidoDeCaja = BobedaMovimientos::where('tipo_operacion', '2')
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');

        $cancelados = BobedaMovimientos::whereIn('tipo_operacion', [1, 2])
            ->where('estado', '=', '3')
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');


        $pdf = PDF::loadView('reportes.movimientosBobeda', [
            'movimientoBobeda' => $movimientoBobeda,
            'trasladoACaja' => $trasladoACaja,
            'recibidoDeCaja' => $recibidoDeCaja,
            'aperturaCaja' => $aperturaCaja,
            'estilos' => $this->estilos,
            'bobeda' => $bobeda,
            'cancelados' => $cancelados,
        ]);

        return $pdf->setOrientation('portrait')->inline();
    }

    public function ComprobanteMovimiento($id)
    {
        $idMovimiento = $id;

        $movimiento = Movimientos::join('cuentas', 'cuentas.id_cuenta', '=', 'movimientos.id_cuenta')
            ->join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->join('cajas', 'cajas.id_caja', '=', 'movimientos.id_caja')
            ->join('empleados', 'empleados.id_empleado', '=', 'cajas.id_usuario_asignado')
            ->where('movimientos.id_movimiento', '=', $idMovimiento)
            ->select('movimientos.*', 'clientes.nombre', 'tipos_cuentas.descripcion_cuenta', 'cuentas.numero_cuenta', 'clientes.dui_cliente', 'clientes.direccion_personal', 'empleados.nombre_empleado')
            ->first();
        // dd($movimiento);


        $formatter = new NumeroALetras();
        $numeroEnLetras = $formatter->toInvoice($movimiento->monto, 2, 'DoLARES');

        $pdf = PDF::loadView('reportes.caja.comprobante', [
            'movimiento' => $movimiento,
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'numeroEnLetras' => $numeroEnLetras
        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    public function comprobanteBobeda($id)
    {
        $idMovimiento = $id;

        $movimientoBobeda = BobedaMovimientos::join('cajas', 'cajas.id_caja', 'bobeda_movimientos.id_caja')
            ->join('empleados', 'empleados.id_empleado', '=', 'cajas.id_usuario_asignado')
            ->where('bobeda_movimientos.id_bobeda_movimiento', '=', $idMovimiento)
            ->orderBy('bobeda_movimientos.id_bobeda_movimiento', 'desc')
            ->select('bobeda_movimientos.*', 'cajas.*', 'empleados.nombre_empleado as nombre_empleado')
            ->first();

        if (!$movimientoBobeda) {
            return redirect("/boveda")->withErrors('El movimiento no existe 😵‍💫');
        }

        $formatter = new NumeroALetras();
        $numeroEnLetras = $formatter->toInvoice($movimientoBobeda->monto, 2, 'DoLARES');

        $pdf = PDF::loadView('reportes.bobeda.comprobante', [
            'movimiento' => $movimientoBobeda,
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'numeroEnLetras' => $numeroEnLetras,
            'bobeda_empleado' => $movimientoBobeda->nombre_empleado
        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    public function RepEstadoCuenta($id)
    {
        $idCuenta = $id;
        $movimientosCuenta = Movimientos::join('cuentas', 'cuentas.id_cuenta', '=', 'movimientos.id_cuenta')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->select('movimientos.*', 'cuentas.*', 'clientes.nombre as nombre_cliente', 'clientes.dui_cliente', 'clientes.id_cliente', 'tipos_cuentas.descripcion_cuenta as tipo_cuenta')
            ->where('cuentas.id_cuenta', '=', $idCuenta)
            ->get();
        if ($movimientosCuenta->count() == 0) {
            return redirect("/cuentas")->withErrors('La cuenta no tiene movimientos aun 😵‍💫, Asegurate realizar una operación antes de generarlo');
        }

        $clienteData = Clientes::find($movimientosCuenta[0]->id_cliente);

        $formatter = new NumeroALetras();
        $numeroEnLetras = $formatter->toInvoice($movimientosCuenta[0]->saldo_cuenta, 2, 'DOLARES');

        $pdf = PDF::loadView('reportes.cuentas.estadoCuenta', [
            'movimientos' => $movimientosCuenta,
            'estilos' => $this->estilos,
            'numeroEnLetras' => $numeroEnLetras,
            'clienteData' => $clienteData
        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    /**
     * @throws \DateMalformedStringException
     */
    public function contrato($id)
    {
        $idCuenta = $id;
        $configuracion = Configuracion::first();
        $reporteName = 'CONTRATO DE CUENTA DE AHORRO';

        $datosContrato = Cuentas::select('id_cuenta', 'id_asociado', 'id_tipo_cuenta', 'numero_cuenta', 'monto_apertura', 'fecha_apertura', 'id_interes')->with([
            'asociado' => function ($query) {
                $query->select('id_asociado', 'id_cliente', 'numero_asociado', 'couta_ingreso', 'monto_aportacion', 'fecha_ingreso'); // Select specific fields from 'asociado'
            },
            'asociado.cliente' => function ($query) {
                $query->select('id_cliente', 'profesion_id', 'genero', 'nombre', 'dui_cliente'); // Select specific fields from 'cliente'
            },
            'asociado.cliente.profesion' => function ($query) {
                $query->select('id', 'name'); // Select specific fields from 'profesion'
            },
            'tipo_cuenta' => function ($query) {
                $query->select('id_tipo_cuenta', 'descripcion_cuenta'); // Select specific fields from 'tipo_cuenta'
            },
            'interes' => function ($query) {
                $query->select('id_intereses_tipo_cuenta', 'interes'); // Select specific fields from 'interes'
            },
            'beneficiarios' => function ($query) {
                $query->select('id_beneficiario', 'id_cuenta', 'nombre', 'parentesco', 'porcentaje'); // Select specific fields from 'beneficiarios'
            },
            'beneficiarios.parentesco_cliente' => function ($query) {
                $query->select('id_parentesco', 'parentesco'); // Select specific fields from 'beneficiarios'
            }
        ])->find($idCuenta)->first();

        $fechaNacimiento = new DateTime($datosContrato->asociado->cliente->fecha_nacimiento);
//        dd($fechaNacimiento);
        $fechaActual = new DateTime();
        $edad = $fechaNacimiento->diff($fechaActual)->y;
//        $beneficiarios = Cuentas::join('beneficiarios', 'beneficiarios.id_cuenta', '=', 'cuentas.id_cuenta')
//        ->where('cuentas.id_cuenta',$id)->get();
        $formatter = new NumeroALetras();
        $numeroEnLetras = $formatter->toInvoice($datosContrato->monto_apertura, 2, 'DoLARES');


        $pdf = PDF::loadView('reportes.cuentas.contrato', [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'datosContrato' => $datosContrato,
            'edad' => $edad,
            'numeroEnLetras' => $numeroEnLetras,
            'configuracion' => $configuracion,
            'reporteName' => $reporteName
        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    public function certificadoDeposito($id)
    {
        $idCuenta = $id;

        $datosContrato = DepositosPlazo::join('asociados', 'depositos_plazo.id_asociado', '=', 'asociados.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('plazos_tasas', 'plazos_tasas.id_tasa', '=', 'depositos_plazo.interes_deposito')
            ->join('cuentas', 'cuentas.id_cuenta', '=', 'depositos_plazo.id_cuenta_depositar')
            ->where('depositos_plazo.id_deposito_plazo_fijo', "=", $id)
            ->orderBy('depositos_plazo.numero_certificado', 'desc')
            ->first();
        // dd($datosContrato);
        $fechaActual = new DateTime();
        $beneficiarios = BeneficiarosDepositos::where('id_deposito', '=', $id)
            ->join('parentesco', 'parentesco.id_parentesco', '=', 'beneficiarios_depositos.parentesco')->get();

        $formatter = new NumeroALetras();
        $numeroEnLetras = $formatter->toInvoice($datosContrato->monto_deposito, 2, 'DLARES');
        $img = public_path('assets/media/logos/certificado_fondo.jpg');


        $pdf = PDF::loadView('reportes.depositoplazo.certificado', [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'datosContrato' => $datosContrato,
            'beneficiarios' => $beneficiarios,
            'numeroEnLetras' => $numeroEnLetras,
            'fondo' => $img
        ]);
        return $pdf->setOrientation('landscape')->inline();
    }

    public function solicitudCredito($idSolicitud)
    {

        $solicitud = SolicitudCredito::with('destinoCredito','tipoGarantia','cliente','cliente.profesion')
//            ->join('clientes', 'clientes.id_cliente', '=', 'solicitud_credito.id_cliente')
            ->orderBy('solicitud_credito.fecha_solicitud')
            ->where('solicitud_credito.id_solicitud', '=', $idSolicitud)->first();

//        dd($solicitud);

        $conyugue = Clientes::where('id_cliente', '=', $solicitud->id_conyugue)->first();

//        $referencias = ReferenciaSolicitud::join('referencias', 'referencias.id_referencia', '=', 'referencia_solicitud.id_referencia')
//            ->where('referencia_solicitud.id_solicitud', '=', $idSolicitud)->get();
        $referencias=ReferenciaSolicitud::with('referencias','parentesco')->where('id_solicitud',$idSolicitud)->get();

        $bienes = SolicitudCreditoBienes::where('id_solicitud', '=', $idSolicitud)->get();

        $formatter = new NumeroALetras();
        $cuotaEnLetras = $formatter->toInvoice($solicitud->cuota + $solicitud->aportaciones ?? 0, 2, 'DÓLARES');
        $montoSolicitadoEnLetras = $formatter->toInvoice($solicitud->monto_solicitado, 2, 'DÓLARES');
        $hoy = new DateTime();
        $nacimiento = new DateTime($solicitud->cliente->fecha_nacimiento);
        $edad = $hoy->diff($nacimiento);
        $edadCliente = $edad->y;

        $edadConyugue = null;
        if ($conyugue == null) {
            $conyugue = new Clientes();
        } else {
            $nacimientoConyugue = new DateTime($conyugue->fecha_nacimiento);
            $edadConyugue = $hoy->diff($nacimientoConyugue);
            $edadConyugue = $edadConyugue->y;
        }
        $configuracion = Configuracion::first();


        $pdf = PDF::loadView('reportes.creditos.solicitud', [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'solicitud' => $solicitud,
            'referencias' => $referencias,
            'bienes' => $bienes,
            'edadCliente' => $edadCliente,
            'conyugue' => $conyugue,
            'cuotaEnLetras' => $cuotaEnLetras,
            'edadConyugue' => $edadConyugue,
            'montoSolicitadoEnLetras' => $montoSolicitadoEnLetras,
            'configuracion' => $configuracion
        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    public function pagareCredito($idSolicitud)
    {

        $solicitud = SolicitudCredito::join('clientes', 'clientes.id_cliente', '=', 'solicitud_credito.id_cliente')
            ->orderBy('solicitud_credito.fecha_solicitud')
            ->where('solicitud_credito.id_solicitud', '=', $idSolicitud)->first();


        $formatter = new NumeroALetras();
        $cuotaEnLetras = $formatter->toInvoice($solicitud->cuota, 2, 'DÓLARES  ');
        $montoSolicitadoEnLetras = $formatter->toInvoice($solicitud->monto_solicitado, 2, 'DÓLARES  ');
        $tasaEnletras = $formatter->toWords($solicitud->tasa);
        $plazoEnLetras = $formatter->toWords($solicitud->plazo);
        $hoy = new DateTime();
        $nacimiento = new DateTime($solicitud->fecha_nacimiento);
        $edad = $hoy->diff($nacimiento);
        $edadCliente = $edad->y;


        $pdf = PDF::loadView('reportes.creditos.pagare', [
            'estilos' => $this->estilos,
            'solicitud' => $solicitud,
            'edadCliente' => $edadCliente,
            'tasaEnletras' => $tasaEnletras,
            'plazoEnLetras' => $plazoEnLetras,
            'cuotaEnLetras' => $cuotaEnLetras,
            'montoSolicitadoEnLetras' => $montoSolicitadoEnLetras
        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    public function liquidacionPrint($idCredito)
    {

        $credito = Credito::where('id_credito', $idCredito)->join('clientes', 'clientes.id_cliente', '=', 'creditos.id_cliente')->first();

        $id_solicitud = $credito->id_solicitud;

        $solicitud = SolicitudCredito::join('clientes', 'clientes.id_cliente', '=', 'solicitud_credito.id_cliente')
            ->orderBy('solicitud_credito.fecha_solicitud')
            ->where('solicitud_credito.id_solicitud', '=', $id_solicitud)->first();


        $lineaCredito = Catalogo::find($solicitud->destino);
        $destino = $lineaCredito->descripcion;

        $garantia = TipoGarantia::find($solicitud->tipo_garantia);
        $garantiaTipo = $garantia->descripcion;

        $liquidaciones = LiquidacionModel::join('catalogo', 'catalogo.id_cuenta', 'liquidacion.id_cuenta')->where('id_credito', $idCredito)->get();
        $sumMontoDebe = $liquidaciones->pluck('monto_debe')->sum();
        $sumMontoHaber = $liquidaciones->pluck('monto_haber')->sum();

        $empleado = Empleados::find($credito->empleado_liquido);
        $empleadoLiquido = $empleado->nombre_empleado;


        $cuentaAhorrro = Cuentas::find($credito->id_cuenta_ahorro);
        $cuentaAportacion = Cuentas::find($credito->id_cuenta_aportacion);
        $numero_cuenta_ahorro = "";
        if ($cuentaAhorrro) {
            $numero_cuenta_ahorro = $cuentaAhorrro->numero_cuenta;
        }
        $numero_cuenta_aportacion = "";
        if ($cuentaAportacion) {

            $numero_cuenta_aportacion = $cuentaAportacion->numero_cuenta;
        }

        $liquido = LiquidacionModel::where(function ($query) {
            $query->where('id_cuenta', 8)
                ->orWhere('id_cuenta', 9);
        })
            ->where('id_credito', $idCredito)
            ->first();
        if ($liquido) {
            $liquido = $liquido->monto_haber;
        } else {
            $liquido = 0;
        }


        $pdf = PDF::loadView('reportes.creditos.liquidacion', [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'solicitud' => $solicitud,
            'credito' => $credito,
            'destino' => $destino,
            'garantiaTipo' => $garantiaTipo,
            'liquidaciones' => $liquidaciones,
            'sumMontoDebe' => $sumMontoDebe,
            'sumMontoHaber' => $sumMontoHaber,
            'liquido' => $liquido,
            'empleadoLiquido' => $empleadoLiquido,
            'numero_cuenta_ahorro' => $numero_cuenta_ahorro,
            'numero_cuenta_aportacion' => $numero_cuenta_aportacion

        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    public function comprobanteAbono($id_pago_credito)
    {

        $abonoCredito = PagosCredito::join('creditos', 'creditos.id_credito', '=', 'pagos_credito.id_credito')
            ->join('clientes', 'clientes.id_cliente', '=', 'creditos.id_cliente')
            ->where('pagos_credito.id_pago_credito', '=', $id_pago_credito)
            ->first();

        // dd($abonoCredito);


        $formatter = new NumeroALetras();
        $TOTALPAGOENLETRAS = $formatter->toInvoice($abonoCredito->total_pago, 2, 'DÓLARES');

        $configuracion = Configuracion::first();
        $empresa = $configuracion->nombre_empresa;

        $pdf = PDF::loadView('reportes.creditos.abonocomprobante', [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'abonoCredito' => $abonoCredito,
            'numeroEnLetras' => $TOTALPAGOENLETRAS,
            'empresa' => $empresa
        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    public function partidaContable($id_partida)
    {
        $partida = PartidasContablesModel::join('tipos_partidas_contables', 'tipos_partidas_contables.id_tipo_partida', '=', 'partidas_contables.tipo_partida')
            ->where('partidas_contables.id_partida_contable', '=', $id_partida)->first();

        $results = DB::table('catalogo AS c')
            ->select(
                'c.descripcion AS descripcion_cuenta_padre',
                'c.numero AS cuentaPadre',
                'b.numero AS cuentaHija',
                'b.descripcion AS descripcion_cuenta_hija',
                'a.parcial',
                'a.cargos',
                'a.abonos'
            )
            ->join('catalogo AS b', 'c.id_cuenta', '=', 'b.id_cuenta_padre')
            ->leftJoin('partida_contables_detalle AS a', 'b.id_cuenta', '=', 'a.id_cuenta')
            ->where('a.id_partida', $id_partida)
            ->orderBy('a.cargos', 'desc')
            ->get();


        $totalCargos = 0;
        $totalAbonos = 0;

        foreach ($results as $row) {
            $totalCargos += $row->cargos;
            $totalAbonos += $row->abonos;
        }


        $formattedResults = [];
        foreach ($results as $result) {
            if (!array_key_exists($result->descripcion_cuenta_padre, $formattedResults)) {
                $formattedResults[$result->descripcion_cuenta_padre] = [
                    'descripcion_cuenta_hija' => [],
                    'total_parcial' => 0,
                    'total_cargos' => 0,
                    'total_abonos' => 0,
                ];
            }


            $formattedResults[$result->descripcion_cuenta_padre]['descripcion_cuenta_hija'][] = [
                'cuenta' => $result->cuentaHija,
                'descripcion_cuenta_hija' => $result->descripcion_cuenta_hija,
                'parcial' => $result->parcial,
                'cargos' => $result->cargos,
                'abonos' => $result->abonos,
            ];
            $formattedResults[$result->descripcion_cuenta_padre]['cuenta_padre'] = $result->cuentaPadre;
            $formattedResults[$result->descripcion_cuenta_padre]['total_parcial'] += $result->parcial;
            $formattedResults[$result->descripcion_cuenta_padre]['total_cargos'] += $result->cargos;
            $formattedResults[$result->descripcion_cuenta_padre]['total_abonos'] += $result->abonos;
        }


        // $formatter = new NumeroALetras();
        // $TOTALPAGOENLETRAS = $formatter->toInvoice($abonoCredito->total_pago, 2, 'DÓLARES');


        $pdf = PDF::loadView('reportes.contabilidad.partidas.partida', [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'partida' => $partida,
            'totalCargos' => $totalCargos,
            'totalAbonos' => $totalAbonos,
            'formattedResults' => $formattedResults
        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    public function catalogoCuentas()
    {


        $catalogo = Catalogo::join('catalogo_tipo', 'catalogo_tipo.id_tipo_catalogo', '=', 'catalogo.tipo_catalogo')
            ->select('catalogo_tipo.descripcion as tipoCuenta', 'catalogo.*')
            ->orderBy('catalogo.id_cuenta', 'asc')
            ->get();


        $pdf = PDF::loadView('reportes.contabilidad.catalogo.catalogo', [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'catalogo' => $catalogo,
        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    public function infored()
    {
        $creditos = Credito::all();
        return view('contabilidad.reportes.infored', compact('creditos'));
    }

    public function inforedExport()
    {
        return Excel::download(new CreditScoreExport, 'creditos.xlsx');
    }

    public function generate_score()
    {
        $configuracion = Configuracion::first();
        $days = $configuracion->dias_gracia + 30;
        $creditos = Credito::whereRaw("DATEDIFF('" . Carbon::now()->format('Y-m-d') . "', creditos.ultima_fecha_pago) >= " . $days . " AND creditos.saldo_capital<>0")->get();

        $lateAccs = new Collection();

        foreach ($creditos as $cr) {
            $found = false;

            foreach ($lateAccs as &$lt) {
                if ($lt['id_cliente'] == $cr->id_cliente) {
                    if ($lt['delincuent_days'] < Carbon::now()->diffInDays($cr->ultima_fecha_pago)) {
                        $lt['delincuent_days'] = Carbon::now()->diffInDays($cr->ultima_fecha_pago);
                    }
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $lateAccs[] = [
                    'id_cliente' => $cr->id_cliente,
                    'ultima_fecha_pago' => $cr->ultima_fecha_pago,
                    'delincuent_days' => Carbon::now()->diffInDays($cr->ultima_fecha_pago)
                ];
            }
        }

        $lateAccs = new Collection($lateAccs);

        foreach ($lateAccs as $lta) {
            $record = ClientCreditScore::where('id_cliente', $lta['id_cliente'])->first();
            if ($record != null) {
                if ($lta['delincuent_days'] <= 3) {
                    $record->score = "A2";
                } else if ($lta['delincuent_days'] > 3 && $lta['delincuent_days'] <= 90) {
                    $record->score = "B";
                } else if ($lta['delincuent_days'] > 90) {
                    $record->score = "C";
                } else {
                    $record->score = "A1";
                }
                $record->save();
            } else {
                $newrec = new ClientCreditScore();
                $newrec->id_cliente = $lta['id_cliente'];
                if ($lta['delincuent_days'] <= 3) {
                    $newrec->score = "A2";
                } else if ($lta['delincuent_days'] > 3 && $lta['delincuent_days'] <= 90) {
                    $newrec->score = "B";
                } else if ($lta['delincuent_days'] > 90) {
                    $newrec->score = "C";
                } else {
                    $newrec->score = "A1";
                }
                $newrec->save();
            }
        }
        echo "<pre>";
        echo json_encode($lateAccs, JSON_PRETTY_PRINT);

        echo "</pre>";
        die();
        return view('contabilidad.reportes.infored', compact('creditos'));
    }
}
