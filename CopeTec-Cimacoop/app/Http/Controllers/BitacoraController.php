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
        $desde = $request->input('desde');
        $hasta = $request->input('hasta') . ' 23:59:59';

        $bitacora = Bitacora::when(isset($desde) && isset($hasta), function ($query) use ($desde, $hasta) {
            $query->whereBetween('fecha', [$desde, $hasta]);
        })
            ->when(!isset($desde) || !isset($hasta), function ($query) {
                $query->orderBy('fecha', 'desc');
            })
            ->paginate(10);





        return view('bitacora.index', compact('bitacora', 'desde', 'hasta'));




    }
    public function reporte($desde, $hasta)
    {

        $bitacora = Bitacora::when(isset($desde) && isset($hasta), function ($query) use ($desde, $hasta) {
            $query->whereBetween('fecha', [$desde, $hasta . ' 23:59:59']);
        })
            ->when(!isset($desde) || !isset($hasta), function ($query) {
                $query->orderBy('fecha', 'desc');
            })
            ->get();


        $pdf = \App::make('snappy.pdf');
        $pdf = PDF::loadView('bitacora.bitacora', [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'bitacora' => $bitacora,
            'desde'=>$desde,
            'hasta'=>$hasta
        ]);
        return $pdf->setOrientation('portrait')->inline();

    }

}