<?php

namespace App\Http\Controllers;

use App\Models\LibretasModel;
use App\Models\Movimientos;
use Illuminate\Http\Request;
use \PDF;

use function PHPUnit\Framework\isEmpty;

class LibretasController extends Controller
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

        $libretas = LibretasModel::join("cuentas", "cuentas.id_cuenta", "=", "libretas.id_cuenta")
            ->join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->whereNotIn('clientes.estado', [0, 7])
            ->distinct()
            ->orderby('cuentas.created_at', 'desc')
            ->select('libretas.id_libreta', 'cuentas.*', 'clientes.nombre as nombre_cliente', 'clientes.dui_cliente as dui_cliente', 'tipos_cuentas.descripcion_cuenta as tipo_cuenta')
            ->get();


        return view("libretas.index", compact("libretas"));
    }
    public function imprimirMovimientos(Request $request)
    {
        // dd($request->all());
        $elementosMarcados = $request->elementosMarcados;
        $movimientos = Movimientos::join('cajas', 'movimientos.id_caja', '=', 'cajas.id_caja')
            ->whereIn('id_movimiento', $elementosMarcados)
            ->select(
                'movimientos.id_movimiento',
                'movimientos.id_cuenta',
                'movimientos.tipo_operacion',
                'movimientos.monto',
                'movimientos.saldo',
                'movimientos.fecha_operacion',
                'movimientos.id_caja',
                'cajas.numero_caja',
                'movimientos.num_movimiento_libreta'
            )->get();

        if (empty($movimientos)) {
            return redirect()->back()->with('error', 'No se ha seleccionado ningún movimiento');
        }
        
        // Movimientos::whereIn('id_movimiento', $elementosMarcados)
        //     ->update([
        //         'impreso' => 1,
        //     ]);


        $pdf = PDF::loadView('libretas.imprimir.movimientos', [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'movimientos' => $movimientos,
            'rows'=>50,

        ]);
        $pdf->setOption('page-width', '150mm'); // Set the width to 210mm or any desired value
        $pdf->setOption('page-height', '500mm');
        return $pdf->inline();
        // return $pdf->setOrientation('portrait')->inline();
        

    }
}
