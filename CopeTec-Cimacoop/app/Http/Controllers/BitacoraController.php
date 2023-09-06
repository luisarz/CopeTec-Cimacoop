<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;
use \PDF;

class BitacoraController extends Controller
{
    private $estilos;
    private $stilosBundle;

    public function __construct()
    {
        $this->estilos = file_get_contents(public_path('assets/css/css.css'));
        $this->stilosBundle = file_get_contents(public_path('assets/css/style.bundle.css'));

    }
    public function index(Request $request)
    {
        $desde = $request->desde;
        $hasta = $request->hasta . ' 23:59:59';

        if (isset($desde) && isset($hasta)) {
            $bitacora = Bitacora::whereRaw('fecha BETWEEN ? AND ?', [$desde, $hasta])->orderBy('fecha','desc')->paginate(10);
        } else {
            $bitacora = Bitacora::orderBy('fecha', 'desc')->paginate(10);
        }



        return view('bitacora.index', compact('bitacora', 'desde', 'hasta'));
    }
    public function reporte($desde, $hasta)
    {
        $fecha_desde = $desde . ' 00:00:00';
        $fecha_hasta = $hasta . ' 23:59:59';
        $bitacora = Bitacora::whereRaw('fecha BETWEEN ? AND ?', [$fecha_desde, $fecha_hasta])->get();



        $pdf = \App::make('snappy.pdf');
        $pdf = PDF::loadView('bitacora.bitacora', [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'bitacora' => $bitacora,
            'desde' => $desde,
            'hasta' => $fecha_hasta,
        ]);
        return $pdf->setOrientation('portrait')->inline();

    }

}