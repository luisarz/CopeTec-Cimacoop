<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\CierreMensualModel;
use App\Models\LibroMayorModel;
use App\Models\PartidasContablesDetalles;
use App\Models\PartidasContablesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \PDF;
use stdClass;

class librosContableController extends Controller
{


    private $estilos;
    private $stilosBundle;
    private $mesesEnLetras = [];
    public function __construct()
    {
        $this->estilos = file_get_contents(public_path('assets/css/css.css'));
        $this->stilosBundle = file_get_contents(public_path('assets/css/style.bundle.css'));
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
    }
    public function libroAuxiliar()
    {
        return view('contabilidad.reportes.libroauxiliar');
    }
    public function libroAuxiliarRep(Request $request)
    {

        $fechaDesde = $request->desde;
        $fechaHasta = $request->hasta;
        $encabezado = $request->encabezado;


        $vista = ($request->tipo_reporte == 1) ? "contabilidad.reportes.libroauxiliar-detallado" : "contabilidad.reportes.libroauxiliar-consolidado";



        $fech = $this->mesesEnLetras;
        $fech = $fech[date('n', strtotime($fechaDesde))];
        $mesCierre = date('n', strtotime($fechaDesde));
        $anioCierre = date('Y', strtotime($fechaDesde));

        if ($mesCierre == 1) {
            $mesCierreAnterior = 12;
            $anioCierre = $anioCierre - 1;
        } else {
            $mesCierreAnterior = $mesCierre - 1;
        }


        $data = [];
        $catalogo = Catalogo::all();
        foreach ($catalogo as $cuenta) {

            $idCuenta = $cuenta->id_cuenta;

            $operacionesRealizadas = PartidasContablesDetalles::whereRaw('fecha_partida BETWEEN ? AND ?', [$fechaDesde, $fechaHasta])
                ->where('id_cuenta', '=', $idCuenta)
                ->get();


            $totalCargos = $operacionesRealizadas->sum('cargos');
            $totalAbonos = $operacionesRealizadas->sum('abonos');

            $cierreAnterior = CierreMensualModel::where('year', '=', $anioCierre)
                ->where('mes', '=', '$mesCierreAnterior')
                ->where('estado', 1)->first();

            $saldoAnterior = 0;

            if ($cierreAnterior) {
                // Buscar el saldo del cierre anterior
                $idCierreAnterior = $cierreAnterior->id;
                $cierreAnteriorCuenta = CierreMensualPartidaModel::where('cierre_mensual_id', $idCierreAnterior)
                    ->where('id_cuenta', '=', $idCuenta)->first();

                if ($cierreAnteriorCuenta) {
                    $saldoAnterior = $cierreAnteriorCuenta->saldo_cierre;
                }
            }

            $nuevoSaldo = ($saldoAnterior + $totalCargos) - $totalAbonos;

            // Actualizar el saldo de la cuenta en el catálogo
            $cuenta->saldo = $nuevoSaldo;
            $cuenta->operaciones = $operacionesRealizadas; // Agregar los detalles de las operaciones a la cuenta
            $data[] = [
                'id' => $cuenta->id_cuenta,
                'numero_cuenta' => $cuenta->numero,
                'descripcion' => $cuenta->descripcion,
                'cuenta' => $cuenta->descripcion,
                'saldo_anterior' => $saldoAnterior,
                'cargos' => $totalCargos,
                'abonos' => $totalAbonos,
                'saldo' => $cuenta->saldo,
                'operaciones' => $cuenta->operaciones
            ];

            // Agregar los datos de la cuenta al arreglo principal
        }


        $pdf = \App::make('snappy.pdf');


        $pdf = PDF::loadView($vista, [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'catalogo' => $data,
            'encabezado' => $encabezado,
            'hasta' => $request->hasta,

        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    public function libroMayor()
    {
        return view('contabilidad.reportes.libromayor');
    }
    public function libroDiario()
    {
        return view('contabilidad.reportes.libroDiarioGeneral');
    }

    public function libroMayorRep(Request $request)
    {
        LibroMayorModel::truncate();

        $fechaDesde = $request->desde;
        $fechaHasta = $request->hasta;
        $encabezado = $request->encabezado;

        $cuentasPadres = Catalogo::whereRaw('LENGTH(numero) = 4')
            ->select('id_cuenta', 'id_cuenta_padre', 'numero', 'descripcion', 'saldo')
            ->get();

        $mesCierre = date('n', strtotime($fechaDesde));
        $anioCierre = date('Y', strtotime($fechaHasta));

        if ($mesCierre == 1) {
            $mesCierreAnterior = 12;
            $anioCierre = $anioCierre - 1;
        } else {
            $mesCierreAnterior = $mesCierre - 1;
        }
        $saldoAnterior = 0;
        $cuentasConMovimientos = [];

        foreach ($cuentasPadres as $cuentaPadre) {
            // Obtén los datos de la cuenta padre
            $cuentaPadreArray = $cuentaPadre->toArray();

            // Llama a la función con el ID de la cuenta padre deseada y las fechas deseadas
            $codigo_agrupador = $cuentaPadre->numero;
            $cuentasConMovimientos[] = array_merge(
                $cuentaPadreArray, // Agrega los datos de la cuenta padre
                $this->sumarMovimientosPorCodigoAgrupadorYFecha($codigo_agrupador, $fechaDesde, $fechaHasta)
            );
        }
        // $arrFormatted = json_encode($cuentasConMovimientos, JSON_PRETTY_PRINT);

        // echo "<pre>";
        // echo json_encode($cuentasConMovimientos, JSON_PRETTY_PRINT);

        // echo "</pre>";


        // return view('reportes.contabilidad.partidas.libromayor', compact('estilos', 'stilosBundle', 'arrFormatted'));


        $pdf = PDF::loadView("contabilidad.reportes.libromayor_rep", [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'catalogo' => $cuentasConMovimientos,
            'encabezado' => $encabezado,
            'hasta' => $request->hasta,

        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    public function libroDiarioGeneral()
    {
        return view('contabilidad.reportes.librodiariogeneral');
    }


    public function libroDiarioUni()
    {
        return view('contabilidad.reportes.librodiario');
    }
    public function libroDiarioGeneralRep(Request $request)
    {
        $filter = Carbon::parse($request->desde);
        $partidas = PartidasContablesModel::whereYear('fecha_partida', $filter->format('Y'))->whereMonth('fecha_partida', $filter->format('m'))->orderBy('num_partida', 'asc')->get();
        // dd($partidas);
        $resPartidas = [];
        $resultSet = [];
        foreach ($partidas as $part => $p) {
            $partida = PartidasContablesModel::join('tipos_partidas_contables', 'tipos_partidas_contables.id_tipo_partida', '=', 'partidas_contables.tipo_partida')
                ->where('partidas_contables.id_partida_contable', '=', $p->id_partida_contable)->first();

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
                ->where('a.id_partida', $p->id_partida_contable)
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
            $resPartidas['partida'] = $partida;
            $resPartidas['totalCargos'] = $totalCargos;
            $resPartidas['totalAbonos'] = $totalAbonos;
            $resPartidas['formattedResults'] = $formattedResults;
            array_push($resultSet, $resPartidas);
        }

        //  dd($resultSet);

        $estilos = $this->estilos;
        $stilosBundle = $this->stilosBundle;
        $fechaDesde = $request->desde;
        $fechaHasta = $request->hasta;
        $encabezado = $request->encabezado;
        // dd($arrFormatted);
        // echo "<pre>";
        // echo json_encode($cuentasConMovimientos, JSON_PRETTY_PRINT);

        // echo "</pre>";
        // die();
        // return view('reportes.contabilidad.partidas.librodiariogeneral', compact('estilos', 'stilosBundle', 'resultSet'));
        $vista = "reportes.contabilidad.partidas.librodiariogeneral";


        $pdf = PDF::loadView($vista, [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'resultSet' => $resultSet,
            'encabezado' => $encabezado,
            'hasta' => $request->hasta,

        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    public function sumarMovimientosPorCodigoAgrupadorYFecha($codigoAgrupador, $fechaInicio, $fechaFin)
    {

        $movimientosPorCuenta = [];

        $results = PartidasContablesDetalles::select('codigo_agrupador', 'fecha_partida')
            ->selectRaw('SUM(cargos) as total_cargos, SUM(abonos) as total_abonos')
            ->whereRaw('fecha_partida BETWEEN ? AND ?', [$fechaInicio, $fechaFin])
            ->where('codigo_agrupador', '=', $codigoAgrupador) // Remove the single quotes here
            ->groupBy('fecha_partida', 'codigo_agrupador')
            ->orderBy('fecha_partida', 'asc')
            ->get();

        //cargamos el saldo anterior
        $mesCierre = date('n', strtotime($fechaInicio));
        $anioCierre = date('Y', strtotime($fechaInicio));
        if ($mesCierre == 1) {
            $mesCierreAnterior = 12;
            $anioCierre = $anioCierre - 1;
        } else {
            $mesCierreAnterior = $mesCierre - 1;
        }

        //Buscar si existe el cierre anterior
        $cierreAnterior = CierreMensualModel::where('year', '$anioCierre')
            ->where('mes', '$mesCierreAnterior')
            ->where('estado', '=', '1')->first();
        $saldoAnterior = 0;
        if ($cierreAnterior) {
            //buscar el saldo del cierre anterior
            $id_cierre_anterior = $cierreAnterior->id;
            $saldoAnterior = DB::table('cierre_mensual_detalle')
                ->where('cierre_mensual_id', '=', '$id_cierre_anterior')
                ->where('codigo_agrupador', '=', '$codigoAgrupador')
                ->sum('saldo_cierre');
        }


        $sumTotalCargos = $results->sum('total_cargos');
        $sumTotalAbonos = $results->sum('total_abonos');


        if ($results->count() > 0) {
            $totals = new stdClass();
            $totals->total_cargos = $sumTotalCargos;
            $totals->total_abonos = $sumTotalAbonos;
            $totals->saldo_anterior = $saldoAnterior;

            $nuevoSaldo = ($saldoAnterior + $sumTotalCargos) - $sumTotalAbonos;
            $totals->saldo = $nuevoSaldo;

            $movimientosPorCuenta['movimientos'] = $results->toArray();
            $movimientosPorCuenta['sumas'] = $totals;
        }

        return $movimientosPorCuenta;
    }
}
