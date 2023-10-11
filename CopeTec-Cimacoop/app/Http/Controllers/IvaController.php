<?php

namespace App\Http\Controllers;

use App\Models\ComprasModel;
use App\Models\FacturasModel;
use \DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
    public function libroFacturasConsumidor()
    {
        return view('iva.libroconsumidor');
    }
    public function libroFacturasCCF()
    {
        return view('iva.libroccf');
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
            'mes' => $this->mesesEnLetras[$filter->format('n')],
            'year' => $filter->format('Y'),
            'encabezado' => $encabezado,
            'hasta' => $request->hasta,

        ]);
        return $pdf->setOrientation('landscape')->inline();
    }
    public function libroFacturasConsumidor_rep(Request $request)
    {
        $filter = Carbon::parse($request->desde);
        $encabezado = "Libro de Compras del mes de " . $this->mesesEnLetras[$filter->format('n')] . " del " . $filter->format('Y');

        $facturas = facturasModel::where('facturas.tipo_documento', 'Factura')
            ->whereYear('fecha_factura', $filter->format('Y'))
            ->whereMonth('fecha_factura', $filter->format('m'))
            ->orderBy('fecha_factura', 'asc')
            ->groupBy('fecha_factura')
            ->select(
                'fecha_factura',
                \Illuminate\Support\Facades\DB::raw('MIN(numero_factura) as inicial'),
                \Illuminate\Support\Facades\DB::raw('MAX(numero_factura) as final'),
                \Illuminate\Support\Facades\DB::raw('SUM(total) as total'),
                \Illuminate\Support\Facades\DB::raw('SUM(retencion) as retencion'),
                \Illuminate\Support\Facades\DB::raw('(SUM(neto) / 1.13) as neto')
            )

            ->get();

        $vista = "iva.libroconsumidor_rep";

        $pdf = PDF::loadView($vista, [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'compras' => $facturas,
            'mes' => $this->mesesEnLetras[$filter->format('n')],
            'year' => $filter->format('Y'),
            'encabezado' => $encabezado,
            'hasta' => $request->hasta,

        ]);
        return $pdf->setOrientation('portrait')->inline();
    }
    public function libroFacturasCCF_rep(Request $request)
    {
        $filter = Carbon::parse($request->desde);
        $encabezado = "Libro de Compras del mes de " . $this->mesesEnLetras[$filter->format('n')] . " del " . $filter->format('Y');

        $facturas = facturasModel::where('facturas.tipo_documento', 'CCF')
            ->whereYear('fecha_factura', $filter->format('Y'))
            ->whereMonth('fecha_factura', $filter->format('m'))
            ->orderBy('fecha_factura', 'asc')
            ->groupBy('fecha_factura')
            ->select(
                'fecha_factura',
                \Illuminate\Support\Facades\DB::raw('MIN(numero_factura) as inicial'),
                \Illuminate\Support\Facades\DB::raw('MAX(numero_factura) as final'),
                \Illuminate\Support\Facades\DB::raw('SUM(total) as total'),
                \Illuminate\Support\Facades\DB::raw('SUM(retencion) as retencion'),
                \Illuminate\Support\Facades\DB::raw('(SUM(neto) / 1.13) as neto')
            )

            ->get();

        $vista = "iva.libroccf_rep";

        $pdf = PDF::loadView($vista, [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'compras' => $facturas,
            'mes' => $this->mesesEnLetras[$filter->format('n')],
            'year' => $filter->format('Y'),
            'encabezado' => $encabezado,
            'hasta' => $request->hasta,

        ]);
        return $pdf->setOrientation('portrait')->inline();
    }
}