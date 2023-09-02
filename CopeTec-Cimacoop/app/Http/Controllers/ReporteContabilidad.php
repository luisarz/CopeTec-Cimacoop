<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\CierreMensualModel;
use App\Models\CierreMensualPartidaModel;
use App\Models\LibroMayorModel;
use App\Models\PartidaContable;
use App\Models\PartidasContablesDetalles;
use App\Models\PartidasContablesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \PDF;
use stdClass;

class ReporteContabilidad extends Controller
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
    public function index()
    {
        $meses = $this->mesesEnLetras;
        $anioActual = date('Y');
        $anios = [$anioActual => $anioActual, $anioActual - 1 => $anioActual - 1];
        $cuentas = Catalogo::where('movimiento', 1)->get();
        return view('contabilidad.reportes.index', compact('meses', 'anios', 'cuentas'));
    }

    public function historicoCuenta()
    {

        $meses = $this->mesesEnLetras;

        $anioActual = date('Y');
        $anios = [$anioActual => $anioActual, $anioActual - 1 => $anioActual - 1];
        $cuentas = Catalogo::where('movimiento', 1)->get();
        return view('contabilidad.reportes.historicocuenta', compact('meses', 'anios', 'cuentas'));
    }
    public function historicoCuenta_reporte(Request $request)
    {

        $catalogo = Catalogo::find($request->id_cuenta)->first();
        if (!$catalogo) {
            return redirect()->back()->with('error', 'No se encontro la cuenta');
        }
        $mesDesde = $request->desde;
        $anoDesde = $request->hasta;
        $id_cuenta = $request->id_cuenta;
        $encabezado = $request->encabezado;

        $partidas = PartidasContablesModel::join('partida_contables_detalle', 'partidas_contables.id_partida_contable', '=', 'partida_contables_detalle.id_partida')
            ->whereBetween('partidas_contables.fecha_partida', [$mesDesde, $anoDesde]) // Filtrar por rango de fechas
            ->where('partida_contables_detalle.id_cuenta', $id_cuenta)
            ->orderBy('partidas_contables.num_partida', 'asc')
            ->get();

        $totalCargos = $partidas->sum('cargos');
        $totalAbonos = $partidas->sum('abonos');



        $anoDesde = date('Y', strtotime($mesDesde));
        $mesesEnLetras = $this->mesesEnLetras;
        $mesesEnLetras = $mesesEnLetras[date('n', strtotime($mesDesde))];
        $mes_cierre = date('n', strtotime($mesDesde));
        $anio_cierre = date('Y', strtotime($mesDesde));
        if ($mes_cierre == 1) {
            $mes_cierre_anterior = 12;
            $anio_cierre = $anio_cierre - 1;
        } else {
            $mes_cierre_anterior = $mes_cierre - 1;
        }

        $cierreAnterior = CierreMensualModel::where('year', $anio_cierre)
            ->where('mes', $mes_cierre_anterior)
            ->where('estado', 1)->first();
        $saldo_anterior = 0;
        if ($cierreAnterior) {
            //buscar el saldo del cierre anterior
            $id_cierre_anterior = $cierreAnterior->id;
            $cierreAnteriorCuenta = CierreMensualPartidaModel::where('cierre_mensual_id', $id_cierre_anterior)
                ->where('id_cuenta', $id_cuenta)->first();
            if ($cierreAnteriorCuenta) {
                $saldo_anterior = $cierreAnteriorCuenta->saldo_cierre;
            }
        }

        $nuevoSaldo = ($saldo_anterior + $totalCargos) - $totalAbonos;


        $pdf = \App::make('snappy.pdf');
        $pdf = PDF::loadView('contabilidad.reportes.historicocuenta_rep', [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'resultado' => $partidas,
            'encabezado' => $encabezado,
            'desde' => $mesesEnLetras,
            'hasta' => $anoDesde,
            'saldo_anterior' => $saldo_anterior,
            'nuevoSaldo' => $nuevoSaldo,
            'totalCargos' => $totalCargos,
            'totalAbonos' => $totalAbonos,
        ]);
        return $pdf->setOrientation('portrait')->inline();
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

            $operacionesRealizadas = PartidasContablesDetalles::whereBetween('fecha_partida', [$fechaDesde, $fechaHasta])
                ->where('id_cuenta', $idCuenta)
                ->get();

            $totalCargos = $operacionesRealizadas->sum('cargos');
            $totalAbonos = $operacionesRealizadas->sum('abonos');

            $cierreAnterior = CierreMensualModel::where('year', $anioCierre)
                ->where('mes', $mesCierreAnterior)
                ->where('estado', 1)->first();

            $saldoAnterior = 0;

            if ($cierreAnterior) {
                // Buscar el saldo del cierre anterior
                $idCierreAnterior = $cierreAnterior->id;
                $cierreAnteriorCuenta = CierreMensualPartidaModel::where('cierre_mensual_id', $idCierreAnterior)
                    ->where('id_cuenta', $idCuenta)->first();

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
        return view('contabilidad.reportes.librodiario');
    }




    public function sumarMovimientosPorCodigoAgrupadorYFecha($codigoAgrupador, $fechaInicio, $fechaFin)
    {

        $movimientosPorCuenta = [];

        $results = PartidasContablesDetalles::select('codigo_agrupador', 'fecha_partida')
            ->selectRaw('SUM(cargos) as total_cargos, SUM(abonos) as total_abonos')
            ->whereBetween('fecha_partida', [$fechaInicio, $fechaFin])
            ->where('codigo_agrupador', '=', $codigoAgrupador)
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
        $cierreAnterior = CierreMensualModel::where('year', $anioCierre)
            ->where('mes', $mesCierreAnterior)
            ->where('estado', 1)->first();
        $saldoAnterior = 0;
        if ($cierreAnterior) {
            //buscar el saldo del cierre anterior
            $id_cierre_anterior = $cierreAnterior->id;
            $saldoAnterior = DB::table('cierre_mensual_detalle')
                ->where('cierre_mensual_id', $id_cierre_anterior)
                ->where('codigo_agrupador', $codigoAgrupador)
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
        echo "<pre>";
        echo json_encode($resultSet, JSON_PRETTY_PRINT);

        echo "</pre>";
        // die();
        // return view('reportes.contabilidad.partidas.librodiario', compact('estilos', 'stilosBundle', 'resultSet'));
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
    public function libroDiarioUniRep(Request $request)
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
        // return view('reportes.contabilidad.partidas.librodiario', compact('estilos', 'stilosBundle', 'resultSet'));
        $vista = "reportes.contabilidad.partidas.librodiario";


        $pdf = PDF::loadView($vista, [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'resultSet' => $resultSet,
            'encabezado' => $encabezado,
            'hasta' => $request->hasta,

        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    public function balancecomprobacion()
    {
        return view('contabilidad.reportes.balanceComprobacion');
    }

    public function balancecomprobacionRep(Request $request)
    {

        LibroMayorModel::truncate();

        $fechaDesde = $request->desde;
        $fechaHasta = $request->hasta;
        $encabezado = $request->encabezado;

        $cuentasPadres = Catalogo::select('id_cuenta', 'id_cuenta_padre', 'numero', 'descripcion', 'saldo')->where('saldo', '!=', 0)
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


        $pdf = PDF::loadView("contabilidad.reportes.balanceComprobacion_rep", [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'catalogo' => $cuentasConMovimientos,
            'encabezado' => $encabezado,
            'hasta' => $request->hasta,

        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    public function estadoResultado()
    {
        return view('contabilidad.reportes.estadoResultado');
    }

    public function estadoResultadoRep(Request $request)
    {

        $fechaInicio = $request->desde;
        $fechaFin = $request->hasta;

        $catalogos = Catalogo::whereIn('numero', ['4', '5'])
            ->select('id_cuenta', 'numero', 'descripcion')
            ->get();



        $json = [];

        $movimientosCostos = [];

        foreach ($catalogos as $catalogo) {
            $codigoAgrupador = $catalogo->numero . '%';
            $cuentasHijas = Catalogo::whereRaw('LENGTH(numero) = 2 AND numero LIKE ?', [$codigoAgrupador])
                ->select('id_cuenta', 'id_cuenta_padre', 'numero', 'descripcion', 'saldo')
                ->get();

            $movimientosCostos = []; // Array para almacenar datos únicos

            foreach ($cuentasHijas as $cuentaHija) {
                $codigo_agrupador = $cuentaHija->numero;

                $movimientos = PartidasContablesDetalles::select('descripcion', 'numero')
                    ->selectRaw('SUM(cargos) as sum_cargos, SUM(abonos) as sum_abonos')
                    ->whereBetween('fecha_partida', [$fechaInicio, $fechaFin])
                    ->where('codigo_agrupador', 'like', $codigo_agrupador . '%')
                    ->groupBy('descripcion', 'numero')
                    ->get();

                $totalCargos = $movimientos->sum('sum_cargos');
                $totalAbonos = $movimientos->sum('sum_abonos');

                if ($movimientos->count() > 0) {
                    // Utiliza el id_cuenta como clave única
                    $claveUnica = $cuentaHija->id_cuenta;

                    // Verifica si la clave única ya existe en el array
                    if (!isset($movimientosCostos[$claveUnica])) {
                        $movimientosCostos[$claveUnica] = [
                            'cuenta' => $cuentaHija->toArray(),
                            'movimientos' => $movimientos->toArray(),
                            'totalCargos' => $totalCargos,
                            'totalAbonos' => $totalAbonos,
                        ];
                    }
                }
            }


            // Agregamos tanto los datos del catálogo como los resultados al arreglo JSON
            $json[] = [
                'cuenta_padre' => $catalogo->toArray(),
                'cuenta_hija' => $movimientosCostos
            ];
        }
        // $arrFormatted = json_encode($json, JSON_PRETTY_PRINT);

        // echo "<pre>";
        // print_r($arrFormatted);
        // echo "</pre>";
        // dd($json);

        $pdf = PDF::loadView("contabilidad.reportes.estadResultado_rep", [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'catalogo' => $json,
            'hasta' => $request->hasta,

        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    public function estadoResultadoMetodo($fechaInicio, $fechaFin)
    {

        $catalogos = Catalogo::whereIn('numero', ['4', '5'])
            ->select('id_cuenta', 'numero', 'descripcion')
            ->get();


        $json = [];
        $movimientosCostos = [];
        foreach ($catalogos as $catalogo) {
            $codigoAgrupador = $catalogo->numero . '%';
            $cuentasHijas = Catalogo::whereRaw('LENGTH(numero) = 2 AND numero LIKE ?', [$codigoAgrupador])
                ->select('id_cuenta', 'id_cuenta_padre', 'numero', 'descripcion', 'saldo')
                ->get();

            $movimientosCostos = []; // Array para almacenar datos únicos

            foreach ($cuentasHijas as $value2) {
                $codigo_agrupador = $value2->numero;

                $movimientos = PartidasContablesDetalles::selectRaw('SUM(cargos) as sum_cargos, SUM(abonos) as sum_abonos')
                    ->whereBetween('fecha_partida', [$fechaInicio, $fechaFin])
                    ->where('codigo_agrupador', 'like', $codigo_agrupador . '%')
                    ->groupBy('descripcion', 'numero')
                    ->get();

                $totalCargos = $movimientos->sum('sum_cargos');
                $totalAbonos = $movimientos->sum('sum_abonos');

                if ($movimientos->count() > 0) {
                    // Utiliza el id_cuenta como clave única, para evitar que se use dos veces el mismo id_cuenta
                    $claveUnica = $value2->id_cuenta;

                    // Verifica si la clave única ya existe en el array
                    if (!isset($movimientosCostos[$claveUnica])) {
                        $movimientosCostos[$claveUnica] = [
                            'totalCargos' => $totalCargos,
                            'totalAbonos' => $totalAbonos,
                        ];
                    }
                }
            }


            // Agregamos tanto los datos del catálogo como los resultados al arreglo JSON
            $json[] = [
                // 'cuenta_padre' => $catalogo->toArray(),
                'cuenta_hija' => $movimientosCostos
            ];
        }

        $estadoResultado = 0;
        $sumIngresos = 0;
        $sumCostos = 0;

        foreach ($json as $key => $value) {
            foreach ($value['cuenta_hija'] as $key2 => $value2) {
                $sumIngresos += $value2['totalAbonos'];
                $sumCostos += $value2['totalCargos'];
            }
        }
        // dd($sumIngresos, $sumCostos, $sumIngresos - $sumCostos);
        $estadoResultado = $sumIngresos - $sumCostos;
        return $estadoResultado;
    }

    public function balanceGeneral()
    {
        return view('contabilidad.reportes.balancegeneral');
    }
    public function balanceGeneralRep(Request $request)
    {
        $fechaFin = $request->hasta;
        $CODIGO_ACTIVO = 1;
        $CODIGO_PASIVO = 2;
        $CODIGO_PATRIMONIO = 3;
        $fechaDesde = $request->desde;
        $fechaHasta = $request->hasta;
        $encabezado = $request->encabezado;

        $datosActivo = $this->procesarBalanceGeneral(1, $fechaDesde, $fechaHasta);
        $datosPasivo = $this->procesarBalanceGeneral(2, $fechaDesde, $fechaHasta);
        $datosPatrimonio= $this->procesarBalanceGeneral(3, $fechaDesde, $fechaHasta);

        dd($datosActivo, $datosPasivo, $datosPatrimonio);

        // $datosActivo = $cuentasConMovimientos;


        // // $json = [$datosActivo];

        // dd($json);
        // $arrFormatted = json_encode($datosActivo, JSON_PRETTY_PRINT);
        // echo "<pre>";
        // print_r($arrFormatted);
        // echo "</pre>";


        // $pdf = PDF::loadView("contabilidad.reportes.balancegeneral_rep", [
        //     'estilos' => $this->estilos,
        //     'stilosBundle' => $this->stilosBundle,
        //     'datosActivo' => $datosActivo,
        //     'datosPasivo' => $datosPasivo,
        //     'datosPatrimonio' => $datosPatrimonio,
        //     'estadoResultado' => $estadoResultado,
        //     'hasta' => $request->hasta,

        // ]);
        // return $pdf->setOrientation('portrait')->inline();
    }

    public function procesarBalanceGeneral($codigoProceso, $fechaDesde, $fechaHasta)
    {
        $codigoProceso = $codigoProceso . '%';
        $cuentasNivelUno = Catalogo::whereRaw('LENGTH(numero) = 2')
            ->where('numero', 'like', $codigoProceso)
            ->select('id_cuenta', 'id_cuenta_padre', 'numero', 'descripcion', 'saldo')
            ->get();

        $reponse = [];
        foreach ($cuentasNivelUno as $cuentaNivelUno) {
            $aDataCuentaNivelUno = $cuentaNivelUno->toArray();
            $codigoAgrupadorNivelUno = $cuentaNivelUno->numero . '%';
            $cuentasNivelDos = Catalogo::whereRaw('LENGTH(numero) = 4')
                ->where('numero', 'like', $codigoAgrupadorNivelUno)
                ->select('id_cuenta', 'id_cuenta_padre', 'numero', 'descripcion', 'saldo')
                ->get();

            $cuentasConMovimientos = ['cuenta_padre' => $aDataCuentaNivelUno];
            foreach ($cuentasNivelDos as $cuentaNivelDos) {
                $cuentaPadreArray = $cuentaNivelDos->toArray();
                $codig_agrupado_nivel_dos = $cuentaNivelDos->numero;
                $datosCuenta = $this->cargarDatosPorCuentaPadreBalanceGeneral($codig_agrupado_nivel_dos, $fechaDesde, $fechaHasta);
                if ($datosCuenta) {
                $cuentasConMovimientos[] = [
                    'cuenta_hija' => $cuentaNivelDos->toArray(),
                    'datos_cuenta' => $datosCuenta
                ];

                }

            }
            //verifica si  $cuentasConMovimientos[]  tiene datos_cuenta
            

            $reponse[] = $cuentasConMovimientos;

        }

       return $reponse;
    }

    public function cargarDatosPorCuentaPadreBalanceGeneral($codigoAgrupador, $fechaInicio, $fechaFin)
    {
        $movimientosPorCuenta = [];

        $results = PartidasContablesDetalles::select('codigo_agrupador', 'fecha_partida')
            ->selectRaw('SUM(cargos) as total_cargos, SUM(abonos) as total_abonos')
            ->whereBetween('fecha_partida', [$fechaInicio, $fechaFin])
            ->where('codigo_agrupador', '=', $codigoAgrupador)
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
        $cierreAnterior = CierreMensualModel::where('year', $anioCierre)
            ->where('mes', $mesCierreAnterior)
            ->where('estado', 1)->first();
        $saldoAnterior = 0;
        if ($cierreAnterior) {
            //buscar el saldo del cierre anterior
            $id_cierre_anterior = $cierreAnterior->id;
            $saldoAnterior = DB::table('cierre_mensual_detalle')
                ->where('cierre_mensual_id', $id_cierre_anterior)
                ->where('codigo_agrupador', $codigoAgrupador)
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

            // $movimientosPorCuenta['movimientos'] = $results->toArray();
            $movimientosPorCuenta['sumas'] = $totals;
        }

        return $movimientosPorCuenta;
    }


}