<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use Illuminate\Http\Request;

class ReporteContabilidad extends Controller
{
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

        $cuentas = Catalogo::where('movimiento',1)->get();
        return view('contabilidad.reportes.index',compact('meses','anios','cuentas'));
    }

    public function historicoCuenta($id_cuenta)
    {



    }
}