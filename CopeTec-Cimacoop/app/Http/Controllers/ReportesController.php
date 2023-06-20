<?php

namespace App\Http\Controllers;

use App\Models\Bobeda;
use App\Models\BobedaMovimientos;
use App\Models\Movimientos;
use Carbon\Carbon;
use Luecano\NumeroALetras\NumeroALetras;
use \PDF;
use App\Helpers\ConversionHelper;


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
    public function RepMovimientosBobeda($id)
    {

        $today = Carbon::today();
        $bobeda = Bobeda::first();

        $movimientoBobeda = BobedaMovimientos::join('cajas', 'cajas.id_caja', 'bobeda_movimientos.id_caja')
            ->where('bobeda_movimientos.fecha_operacion', '>=', $today)
            ->orderBy('bobeda_movimientos.id_bobeda_movimiento', 'asc')
            ->paginate(10);


        $aperturaCaja = BobedaMovimientos::where('tipo_operacion', 3)
            ->where('fecha_operacion', '>=', today())
            ->select('monto', 'fecha_operacion')->first();


        $trasladoACaja = BobedaMovimientos::where('tipo_operacion', '1')
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');
        $recibidoDeCaja = BobedaMovimientos::where('tipo_operacion', '2')
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');

        $cancelados = BobedaMovimientos::whereIn('tipo_operacion', [1, 2])
            ->where('estado', '=', '3')
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');


        $pdf = \App::make('snappy.pdf');

        $pdf->setOptions([
            'enable-local-file-access' => true
        ]);
        $estilos = file_get_contents(public_path('assets/css/css.css'));


        $pdf = PDF::loadView('reportes.movimientosBobeda', [
            'movimientoBobeda' => $movimientoBobeda,
            'trasladoACaja' => $trasladoACaja,
            'recibidoDeCaja' => $recibidoDeCaja,
            'aperturaCaja' => $aperturaCaja,
            'estilos' => $estilos,
            'bobeda' => $bobeda,
            'cancelados' => $cancelados,
        ]);

        return $pdf->setOrientation('portrait')->inline();

    }
    public function ComprobanteMovimiento($id)
    {
        $idMovimiento = $id;
        $estilos = file_get_contents(public_path('assets/css/css.css'));

        $movimiento = Movimientos::join('cuentas', 'cuentas.id_cuenta', '=', 'movimientos.id_cuenta')
            ->join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->join('cajas', 'cajas.id_caja', '=', 'movimientos.id_caja')
            ->join('empleados', 'empleados.id_empleado', '=', 'cajas.id_usuario_asignado')
            ->where('movimientos.id_movimiento', '=', $idMovimiento)
            ->select('movimientos.*', 'clientes.nombre', 'tipos_cuentas.descripcion_cuenta', 'cuentas.numero_cuenta', 'clientes.dui_cliente', 'clientes.direccion_personal', 'empleados.nombre_empleado')
            ->first();

        $formatter = new NumeroALetras();
        $numeroEnLetras = $formatter->toInvoice($movimiento->monto, 2, 'DoLARES');
        $pdf = \App::make('snappy.pdf');
        $pdf = PDF::loadView('reportes.caja.comprobante', [
            'movimiento' => $movimiento,
            'estilos' => $estilos,
            'numeroEnLetras' => $numeroEnLetras
        ]);
        return $pdf->setOrientation('portrait')->inline();
    }
    public function comprobanteBobeda($id)
    {
        $idMovimiento = $id;
        $estilos = file_get_contents(public_path('assets/css/css.css'));

        $movimientoBobeda = BobedaMovimientos::join('cajas', 'cajas.id_caja', 'bobeda_movimientos.id_caja')
            ->join('empleados', 'empleados.id_empleado', '=', 'cajas.id_usuario_asignado')
            ->where('bobeda_movimientos.id_bobeda_movimiento', '=', $idMovimiento)
            ->orderBy('bobeda_movimientos.id_bobeda_movimiento', 'desc')
            ->select('bobeda_movimientos.*', 'cajas.*', 'empleados.nombre_empleado')
            ->first();

            // dd($movimientoBobeda);

        $formatter = new NumeroALetras();
        $numeroEnLetras = $formatter->toInvoice($movimientoBobeda->monto, 2, 'DoLARES');
        $pdf = \App::make('snappy.pdf');
        $pdf = PDF::loadView('reportes.bobeda.comprobante', [
            'movimiento' => $movimientoBobeda,
            'estilos' => $estilos,
            'numeroEnLetras' => $numeroEnLetras
        ]);
        return $pdf->setOrientation('portrait')->inline();
    }
}