<?php

namespace App\Http\Controllers;

use App\Models\ComprasModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use stdClass;
use \PDF;

class IvaController extends Controller
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
    public function libroCompra()
    {
        return view('iva.librocompra');
    }
    public function libroCompra_rep(Request $request)
    {
        $filter = Carbon::parse($request->desde);
        $encabezado = "Libro de Compras del mes de " . $this->mesesEnLetras[$filter->format('n')] . " del " . $filter->format('Y');

        $compras = ComprasModel::join('proveedores', 'compras.id_proveedor', '=', 'proveedores.id_proveedor')
        ->whereYear('fecha_compra', $filter->format('Y'))
        ->whereMonth('fecha_compra', $filter->format('m'))
        ->orderBy('fecha_compra', 'asc')->get();
      
        $vista = "iva.librocompra_rep";

        $pdf = PDF::loadView($vista, [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'compras' => $compras,
            'mes'=>$this->mesesEnLetras[$filter->format('n')],
            'year'=>$filter->format('Y'),
            'encabezado' => $encabezado,
            'hasta' => $request->hasta,

        ]);
        return $pdf->setOrientation('landscape')->inline();
    }
}
