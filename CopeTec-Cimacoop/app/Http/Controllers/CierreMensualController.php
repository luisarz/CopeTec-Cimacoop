<?php

namespace App\Http\Controllers;

use App\Models\CierreMensualModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CierreMensualController extends Controller
{
    public function index(Request $request)
    {
        
        $filtro = $request->input('filtro');
        $cierres = CierreMensualModel::paginate(10);
        return view('contabilidad.cierre_mensual.index',compact('cierres','filtro'));
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

        return view('contabilidad.cierre_mensual.add',compact('meses','anios'));
    }
}
