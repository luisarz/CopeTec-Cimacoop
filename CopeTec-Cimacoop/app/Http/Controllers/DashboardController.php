<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Credito;
use App\Models\Movimientos;
use App\Models\PagosCredito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
      Session::put("estadoMenuminimizado", "0");

        //ultimos 10 depositos
        //ultimos 10 retiros
        //ultimos 10 creditos
        //ultimos 10 abonos

        $id_rol=Session::get('id_rol');

        $depositos = Movimientos::join('cuentas', 'cuentas.id_cuenta', '=', 'movimientos.id_cuenta')
            ->join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->where('movimientos.tipo_operacion', 1)
            ->select('movimientos.*', 'clientes.nombre', 'tipos_cuentas.descripcion_cuenta', 'cuentas.numero_cuenta', 'clientes.dui_cliente')
            ->orderby('movimientos.id_movimiento', 'desc')
            ->paginate(5);

        $retiros = Movimientos::join('cuentas', 'cuentas.id_cuenta', '=', 'movimientos.id_cuenta')
            ->join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->where('movimientos.tipo_operacion', 2)
            ->select('movimientos.*', 'clientes.nombre', 'tipos_cuentas.descripcion_cuenta', 'cuentas.numero_cuenta', 'clientes.dui_cliente')
            ->orderby('movimientos.id_movimiento', 'desc')
            ->paginate(5);



        $creditos = Credito::join('clientes', 'clientes.id_cliente', '=', 'creditos.id_cliente')
            ->where('creditos.estado', 2)->paginate(5);

        $desembolsosPendientes = Credito::join('clientes', 'clientes.id_cliente', '=', 'creditos.id_cliente')
            ->where('creditos.estado', 1)->paginate(5);

        $abonos = PagosCredito::join('creditos', 'creditos.id_credito', '=', 'pagos_credito.id_credito')
            ->paginate(5);

        $bitacora = Bitacora::orderBy('fecha', 'desc')->paginate(5);
        $bitacora->withQueryString()->onEachSide(1);


        // dd($abonos);
        return view("dashboard", compact(
            'depositos',
            'retiros',
            'creditos',
            'desembolsosPendientes',
            'abonos',
            'bitacora',
            'id_rol'
        )
        );
    }
}