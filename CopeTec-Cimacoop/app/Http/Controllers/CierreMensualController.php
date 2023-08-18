<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\CierreMensualModel;
use App\Models\CierreMensualPartidaModel;
use App\Models\PartidasContablesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \PDF;

class CierreMensualController extends Controller
{
    public function index(Request $request)
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
        $filtro = $request->input('filtro');
        $cierres = CierreMensualModel::orderBy('id', 'desc')->paginate(10);
        return view('contabilidad.cierre_mensual.index', compact('cierres', 'filtro', 'meses'));
    }

    public function add()
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
            $anioActual - 1 => $anioActual - 1,
            // $anioActual + 1 => $anioActual + 1,
        ];

        return view('contabilidad.cierre_mensual.add', compact('meses', 'anios'));
    }

    public function post(Request $request)
    {

        $mes_cierre = $request->mes;
        $anio_cierre = $request->year;


        // buscamos si el cierre ya existe
        $VerificarCierreMes = CierreMensualModel::where('mes', $mes_cierre)
            ->where('year', $anio_cierre)
            ->where('estado', 1)->first();
        if ($VerificarCierreMes) {
            return response()->json(['estado' => 'faild', 'mensaje' => 'El mes que intenta cerrar ya se encuentra cerrado']);
        }

        //buscamos si existe un cierre anterior

        if ($mes_cierre == 1) {
            $mes_cierre_anterior = 12;
            $anio_cierre_anterior = $anio_cierre - 1;
        } else {
            $mes_cierre_anterior = $mes_cierre - 1;
            $anio_cierre_anterior = $anio_cierre;
        }

        /*Cerramoo el mes par obtener el id del cierre actual*/
        $cierreMensual = new CierreMensualModel();
        $cierreMensual->mes = $mes_cierre;
        $cierreMensual->year = $anio_cierre;
        $cierreMensual->fecha_cierre = now();
        $cierreMensual->estado = '0'; //pendiente de cerrar
        $cierreMensual->save();

        $ID_CIERRE_ACTUAL = $cierreMensual->id;


        $cierreAnterior = CierreMensualModel::where('year', $anio_cierre_anterior)
            ->where('mes', $mes_cierre_anterior)
            ->where('estado', 1)->first();

        $id_cierre_anterior = null;
        if ($cierreAnterior) {
            $id_cierre_anterior = $cierreAnterior->id;


        }


        $catalogo = Catalogo::all();

        if ($catalogo) {
            /*Buscamos saldos anteriores y movimientos 
            del mes para calcular el sald de cierre mensual*/
            foreach ($catalogo as $cuenta) {
                $id_cuenta = $cuenta->id_cuenta;
                //buscar el saldo del cierre anterior
                $cierreAnteriorCuenta = CierreMensualPartidaModel::where('cierre_mensual_id', $id_cierre_anterior)
                    ->where('id_cuenta', $id_cuenta)->first();
                $saldo_anterior = 0;
                if ($cierreAnteriorCuenta) {
                    $saldo_anterior = $cierreAnteriorCuenta->saldo_cierre;
                }



                //buscar los saldos de las operaciones del mes
                $resultado = PartidasContablesModel::join('partida_contables_detalle', 'partidas_contables.id_partida_contable', '=', 'partida_contables_detalle.id_partida')
                    ->whereRaw('YEAR(partidas_contables.fecha_partida) = ?', [$anio_cierre])
                    ->whereRaw('MONTH(partidas_contables.fecha_partida) = ?', [$mes_cierre])
                    ->where('partida_contables_detalle.id_cuenta', $id_cuenta)
                    ->selectRaw('COALESCE(SUM(cargos), 0) as total_cargos, COALESCE(SUM(abonos), 0) as total_abonos')
                    ->first();

                $total_cargos = $resultado->total_cargos;
                $total_abonos = $resultado->total_abonos;



                $total_cargos = $resultado->total_cargos = null ? 0 : $resultado->total_cargos;
                $total_abonos = $resultado->total_abonos = null ? 0 : $resultado->total_abonos;

                $cierreMensualCuent = new CierreMensualPartidaModel();
                $cierreMensualCuent->id_cuenta = $id_cuenta;
                $cierreMensualCuent->saldo_anterior = $saldo_anterior;
                $cierreMensualCuent->total_cargos = $total_cargos;
                $cierreMensualCuent->total_abonos = $total_abonos;
                $cierreMensualCuent->saldo_cierre = ($saldo_anterior + $total_cargos) - $total_abonos;
                $cierreMensualCuent->cierre_mensual_id = $ID_CIERRE_ACTUAL;
                $cierreMensualCuent->save();

            }

        }
        //actuallizar el cierre mensual a 1
        $cierreMensual->estado = '1'; //cerrado
        $cierreMensual->save();
        return response()->json([
            'estado' => 'success',
            'mensaje' => 'Mes Cerrado de manera exitosa',
            'id_cierre' => $ID_CIERRE_ACTUAL
        ]);

    }

    public function revertirCierre(Request $request)
    {

        $pasword = $request->password_user;
        //validar si la contraseña corresponde al usuario que ha iniciado sesion
        
        $usuario = auth()->user();
        $passwordValido = password_verify($pasword, $usuario->password);
        if (!$passwordValido) {
            return response()->json(['estado' => 'faild', 'mensaje' => 'La contraseña ingresada no es valida']);
        }

        $id_cierre = $request->id;
        $cierreMensual = CierreMensualModel::find($id_cierre);
        $cierreMensual->estado = 2;//Revertido
        $cierreMensual->fecha_reversion = now();
        $cierreMensual->save();

        return redirect('contabilidad/cierre-mensual');

    }
    public function imprimir($id_cierre)
    {

        $cierreMensual = CierreMensualModel::find($id_cierre);

        $catalgoDetallesCierre = CierreMensualModel::
            join(
                'cierre_mensual_partida',
                'cierre_mensual.id',
                '=',
                'cierre_mensual_partida.cierre_mensual_id'
            )
            ->join('catalogo', 'cierre_mensual_partida.id_cuenta', '=', 'catalogo.id_cuenta')
            ->join('catalogo_tipo', 'catalogo.tipo_catalogo', '=', 'catalogo_tipo.id_tipo_catalogo')

            ->where('cierre_mensual.id', $id_cierre)
            ->select(
                'catalogo.descripcion',
                'cierre_mensual_partida.saldo_anterior',
                'cierre_mensual_partida.total_cargos',
                'cierre_mensual_partida.total_abonos',
                'cierre_mensual_partida.saldo_cierre',
                'catalogo.*',
                'catalogo_tipo.descripcion as tipo_cuenta'
            )
            ->get();

        $pdf = \App::make('snappy.pdf');
        $pdf = PDF::loadView('reportes.contabilidad.cierremensual.cierremensual', [
            'detalles_cierre' => $catalgoDetallesCierre,
            'cierreMensual' => $cierreMensual,
            'estilos' => file_get_contents(public_path('assets/css/css.css')),
            'stilosBundle' => file_get_contents(public_path('assets/css/style.bundle.css'))

        ]);
        return $pdf->setOrientation('portrait')->inline();
    }
}