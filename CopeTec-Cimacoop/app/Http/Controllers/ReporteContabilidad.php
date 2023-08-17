<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\CierreMensualModel;
use App\Models\CierreMensualPartidaModel;
use App\Models\PartidasContablesModel;
use Illuminate\Http\Request;
use \PDF;
class ReporteContabilidad extends Controller
{
    private $estilos;
    private $stilosBundle;
    public function __construct()
    {
        $this->estilos = file_get_contents(public_path('assets/css/css.css'));
        $this->stilosBundle = file_get_contents(public_path('assets/css/style.bundle.css'));

    }
    public function index()
    {
        $meses = [
            1 => 'ENERO',
            2 => 'FEBRERO',
            3 => 'MARZO',
            4 => 'ABRIL',
            5 => 'MAYO',
            6 => 'JUNIO',
            7 => 'JULIO',
            8 => 'AGOSTO',
            9 => 'SEPTIEMBRE',
            10 => 'OCTUBRE',
            11 => 'NOVIEMBRE',
            12 => 'DICIEMBRE',
        ];

        $anioActual = date('Y');
        $anios = [
            $anioActual => $anioActual,
            $anioActual - 1 => $anioActual - 1
        ];

        $cuentas = Catalogo::where('movimiento', 1)->get();
        return view('contabilidad.reportes.index', compact('meses', 'anios', 'cuentas'));
    }

    public function historicoCuenta()
    {

        $meses = [
            1 => 'ENERO',
            2 => 'FEBRERO',
            3 => 'MARZO',
            4 => 'ABRIL',
            5 => 'MAYO',
            6 => 'JUNIO',
            7 => 'JULIO',
            8 => 'AGOSTO',
            9 => 'SEPTIEMBRE',
            10 => 'OCTUBRE',
            11 => 'NOVIEMBRE',
            12 => 'DICIEMBRE',
        ];

        $anioActual = date('Y');
        $anios = [
            $anioActual => $anioActual,
            $anioActual - 1 => $anioActual - 1
        ];

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


        $mesesEnLetras = [
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
        $anoDesde = date('Y', strtotime($mesDesde));

        $mesesEnLetras = $mesesEnLetras[date('n', strtotime($mesDesde))];
        $mes_cierre = date('n', strtotime($mesDesde));
        $anio_cierre = date('Y', strtotime($mesDesde));
        if ($mes_cierre == 1) {
            $mes_cierre_anterior = 12;
            $anio_cierre = $anio_cierre - 1;
        }else{
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

      $nuevoSaldo= ($saldo_anterior + $totalCargos) - $totalAbonos;


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
            'totalCargos'=>$totalCargos,
            'totalAbonos'=> $totalAbonos,
        ]);
        return $pdf->setOrientation('portrait')->inline();
    }
}