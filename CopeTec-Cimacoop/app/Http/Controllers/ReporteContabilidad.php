<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\CierreMensualModel;
use App\Models\CierreMensualPartidaModel;
use App\Models\LibroMayorModel;
use App\Models\PartidaContable;
use App\Models\PartidasContablesDetalles;
use App\Models\PartidasContablesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \PDF;

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

    public function obtenerCuentasConMovimientosYPartidas($idCuentaPadre, $fechaInicio, $fechaFin)
    {


        $cuentasHijas = Catalogo::where('id_cuenta_padre', $idCuentaPadre)
            ->select('id_cuenta', 'id_cuenta_padre', 'numero', 'descripcion', 'saldo')
            ->get();

        if ($cuentasHijas->isEmpty()) {
            return [];
        }

        $result = [];

        // Crear un arreglo para almacenar la suma de cargos y abonos por fecha
        $totalCargosPorFecha = [];
        $totalAbonosPorFecha = [];
        $mesCierre = date('n', strtotime($fechaInicio));
        $anioCierre = date('Y', strtotime($fechaInicio));
        foreach ($cuentasHijas as $cuentaHija) {
            $id_cuenta_hija = $cuentaHija->id_cuenta;
            $cuentaHijaArray = $cuentaHija->toArray();

            //Bucar el saldo Anterior

            $saldo_anterior = 0;

            $movimientos = PartidasContablesDetalles::where('id_cuenta', $id_cuenta_hija)
                ->whereBetween('fecha_partida', [$fechaInicio, $fechaFin])
                ->select(
                    DB::raw('DATE(fecha_partida) as fecha_dia'),
                    DB::raw('SUM(cargos) as total_cargos'),
                    DB::raw('SUM(abonos) as total_abonos')
                )
                ->groupBy('fecha_dia')
                ->get();

            foreach ($movimientos as $operacion) {
                $libroMayor = new LibroMayorModel;
                $libroMayor->id_cuenta_padre = $idCuentaPadre;
                $libroMayor->id_cuenta = $id_cuenta_hija;
                $libroMayor->numero_cuenta = $cuentaHija->numero;
                $libroMayor->fecha_operacion = $operacion->fecha_dia;
                $libroMayor->saldo_anterior = $saldo_anterior;
                $libroMayor->cargos = $operacion->total_cargos;
                $libroMayor->abonos = $operacion->total_abonos;
                $libroMayor->save();
            }






            // Sumar los cargos y abonos de la cuenta hija por fecha
            foreach ($movimientos as $movimiento) {
                $fechaDia = $movimiento->fecha_dia;
                $totalCargosPorFecha[$fechaDia] = ($totalCargosPorFecha[$fechaDia] ?? 0) + $movimiento->total_cargos;
                $totalAbonosPorFecha[$fechaDia] = ($totalAbonosPorFecha[$fechaDia] ?? 0) + $movimiento->total_abonos;
            }

            $cuentaHijaArray['movimientos'] = $movimientos;

            // Llamar recursivamente para cuentas hijas
            $cuentaHijaArray['cuentas_hijas'] = $this->obtenerCuentasConMovimientosYPartidas(
                $cuentaHija->id_cuenta,
                $fechaInicio,
                $fechaFin
            );

            $result[] = $cuentaHijaArray;
        }

        // Agregar la suma total de cargos y abonos por fecha al resultado
        $result['total_cargos_por_fecha'] = $totalCargosPorFecha;
        $result['total_abonos_por_fecha'] = $totalAbonosPorFecha;



        return $result;
    }



    public function libroMayorRep(Request $request)
    {
        LibroMayorModel::truncate();
        $estilos = $this->estilos;
        $stilosBundle = $this->stilosBundle;
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
            $idCuentaPadre = $cuentaPadre->id_cuenta;
            $cuentasConMovimientos[] = array_merge(
                $cuentaPadreArray, // Agrega los datos de la cuenta padre
                $this->obtenerCuentasConMovimientosYPartidas($idCuentaPadre, $fechaDesde, $fechaHasta)
            );
        }
        $arrFormatted = json_encode($cuentasConMovimientos, JSON_PRETTY_PRINT);
        dd($arrFormatted);
        echo "<pre>";
        echo json_encode($cuentasConMovimientos, JSON_PRETTY_PRINT);

        echo "</pre>";
        die();
        return view('reportes.contabilidad.partidas.libromayor', compact('estilos', 'stilosBundle', 'arrFormatted'));
        // $vista = "contabilidad.reportes.libromayor_rep";


        // $pdf = PDF::loadView($vista, [
        //     'estilos' => $this->estilos,
        //     'stilosBundle' => $this->stilosBundle,
        //     'catalogo' => $datosJson,
        //     'encabezado' => $encabezado,
        //     'hasta' => $request->hasta,

        // ]);
        // return $pdf->setOrientation('portrait')->inline();
    }
    public function libroMayorRept(Request $request)
    {
        LibroMayorModel::truncate();
        $estilos = $this->estilos;
        $stilosBundle = $this->stilosBundle;
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
            $idCuentaPadre = $cuentaPadre->id_cuenta;
            $cuentaPadreArray['sub_array'] =  $this->obtenerCuentasConMovimientosYPartidas($idCuentaPadre, $fechaDesde, $fechaHasta);
            $cuentasConMovimientos[] = array_merge(
                $cuentaPadreArray, // Agrega los datos de la cuenta padre

            );
        }
        $arrFormatted = json_encode($cuentasConMovimientos, JSON_PRETTY_PRINT);
        // dd($arrFormatted);
        // echo "<pre>";
        // echo json_encode($cuentasConMovimientos, JSON_PRETTY_PRINT);

        // echo "</pre>";
        // die();
        return view('reportes.contabilidad.partidas.libromayor', compact('estilos', 'stilosBundle', 'arrFormatted'));
        // $vista = "reportes.contabilidad.partidas.libromayor";


        // $pdf = PDF::loadView($vista, [
        //     'estilos' => $this->estilos,
        //     'stilosBundle' => $this->stilosBundle,
        //     'arrFormatted' => $arrFormatted,
        //     'encabezado' => $encabezado,
        //     'hasta' => $request->hasta,

        // ]);
        // return $pdf->setOrientation('portrait')->inline();
    }
}
