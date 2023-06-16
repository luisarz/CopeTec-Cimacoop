<?php

namespace App\Http\Controllers;

use App\Models\Bobeda;
use App\Models\BobedaMovimientos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \PDF;

class ReportesController extends Controller
{
    public function index()
    {
        $pdf = \App::make('snappy.pdf');
        //return view("welcome");
        $pdf = PDF::loadView('reportes.test.index');
        //return view("Reportes.informeclientediario",compact('reporte'));
        return $pdf->setOrientation('landscape')->inline();
    }
    public function movimientosBobeda($id){

        $today = Carbon::today();
        $bobeda = Bobeda::first();

        $movimientoBobeda = BobedaMovimientos::join('cajas', 'cajas.id_caja', 'bobeda_movimientos.id_caja')
            ->where('bobeda_movimientos.fecha_operacion', '>=', $today)
            ->orderBy('bobeda_movimientos.id_bobeda_movimiento', 'desc')
            ->paginate(10);


        $aperturaCaja = BobedaMovimientos::where('tipo_operacion', 3)
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');
        $trasladoACaja = BobedaMovimientos::where('tipo_operacion', '1')
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');
        $recibidoDeCaja = BobedaMovimientos::where('tipo_operacion', '2')
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');


        $pdf = \App::make('snappy.pdf');
        $pdf->setOption('user-style-sheet', public_path('assets/plugins/custom/datatables/datatables.bundle.css'));

        $pdf = PDF::loadView('reportes.movimientosBobeda', [
            'movimientoBobeda' => $movimientoBobeda,
            'trasladoACaja'=>$trasladoACaja,
            'recibidoDeCaja'=>$recibidoDeCaja,
            'aperturaCaja' => $aperturaCaja
        ]);
        
        return $pdf->setOrientation('portrait')->inline();
    }
}
