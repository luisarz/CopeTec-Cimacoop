<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\CierreMensualModel;
use App\Models\CierreMensualPartidaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CierreMensualController extends Controller
{
    public function index(Request $request)
    {

        $filtro = $request->input('filtro');
        $cierres = CierreMensualModel::paginate(10);
        return view('contabilidad.cierre_mensual.index', compact('cierres', 'filtro'));
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
            ->where('year', $anio_cierre)->first();
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
        $cierreAnterior = CierreMensualModel::where('year', $anio_cierre_anterior)
            ->where('mes', $mes_cierre_anterior)->first();

        $id_cierre_anterior = null;
        if ($cierreAnterior) {
            $id_cierre_anterior = $cierreAnterior->id;
            

        }


        $catalogo = Catalogo::all();

        if ($catalogo) {
            foreach ($catalogo as $cuenta) {
                $id_cuenta = $cuenta->id;
                //buscar el saldo del cierre anterior
                $cierreAnteriorCuenta = CierreMensualPartidaModel::where('cierre_mensual_id', $id_cierre_anterior)
                    ->where('id_cuenta', $id_cuenta )->get();
                if ($cierreAnteriorCuenta) {
                    $saldo_anterior = $cierreAnteriorCuenta->saldo_cierre;
                } else {
                    $saldo_anterior = 0;
                }

                //buscar los saldos de las operaciones del mes
                
            }

        }



    }
}