<?php

namespace App\Http\Controllers;

use App\Models\Cajas;
use App\Models\Cuentas;
use App\Models\Movimientos;
use Illuminate\Http\Request;

class MovimientosController extends Controller
{

    public function index()
    {
        $id_empleado_usuario = session()->get('id_empleado_usuario');

        $cajaAperturada = Cajas::join('apertura_caja', 'apertura_caja.id_caja', '=', 'cajas.id_caja')
            ->where("estado_caja", '=', '1')
            ->where('id_usuario_asignado', '=', $id_empleado_usuario)
            ->select('cajas.id_caja', 'cajas.numero_caja', 'cajas.id_usuario_asignado', 'apertura_caja.monto_apertura', 'apertura_caja.fecha_apertura')
            ->first();

        $movimientos = Movimientos::join('cuentas', 'cuentas.id_cuenta', '=', 'movimientos.id_cuenta')
            ->join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->where('movimientos.fecha_operacion', today())
            ->where('movimientos.id_caja', '=', $cajaAperturada->id_caja)
            ->select('movimientos.*', 'clientes.nombre', 'tipos_cuentas.descripcion_cuenta', 'cuentas.numero_cuenta', 'clientes.dui_cliente')
            ->orderby('movimientos.fecha_operacion', 'asc')
            ->paginate(10);



        $totalMovimientos = Movimientos::selectRaw('SUM(CASE WHEN tipo_operacion = 1 THEN monto ELSE 0 END) AS totalDepositos, SUM(CASE WHEN tipo_operacion = 2 THEN monto ELSE 0 END) AS totalRetiros')
            ->where('fecha_operacion', today())
            ->where('id_caja', '=', $cajaAperturada->id_caja)
            ->first();

        $totalDepositos = $totalMovimientos->totalDepositos;
        $totalRetiros = $totalMovimientos->totalRetiros;




        return view("movimientos.index", compact("movimientos", "cajaAperturada", "totalRetiros", "totalDepositos"));
    }

    public function depositar($id)
    {
        $aperturaCaja = $id;
        $cuentas = Cuentas::join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->select('cuentas.id_cuenta', 'clientes.nombre', 'tipos_cuentas.descripcion_cuenta', 'cuentas.numero_cuenta','cuentas.numero_cuenta', 'clientes.dui_cliente')
            ->get();
        return view("movimientos.depositar", compact("cuentas", "aperturaCaja"));
    }
    public function retirar($id)
    {
        $aperturaCaja = $id;
        $cuentas = Cuentas::join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->select('cuentas.id_cuenta', 'clientes.nombre', 'tipos_cuentas.descripcion_cuenta', 'cuentas.numero_cuenta','cuentas.saldo_cuenta', 'clientes.dui_cliente')
            ->get();
        return view("movimientos.retirar", compact("cuentas", "aperturaCaja"));
    }



    public function realizardeposito(Request $request)
    {
        $id_cuenta_destino = $request->id_cuenta;
        $cuentaDestinoDatos = Cuentas::findOrFail($id_cuenta_destino);
        $movimiento = new Movimientos();
        $movimiento->id_cuenta = $request->id_cuenta;
        $movimiento->tipo_operacion = 1;
        $movimiento->monto = $request->monto;
        $movimiento->fecha_operacion = today();
        $movimiento->cajero_operacion = session()->get('id_empleado_usuario');
        $movimiento->id_caja = $request->id_caja;
        $movimiento->estado = 1;
        $movimiento->save();
        $cuentaDestinoDatos->saldo_cuenta = $cuentaDestinoDatos->saldo_cuenta + $request->monto;
        $cuentaDestinoDatos->save();
        return redirect("/movimientos");

    }

    public function realizarretiro(Request $request)
    {
        $id_cuenta_origen = $request->id_cuenta;
        $cuentaOrigenDatos = Cuentas::findOrFail($id_cuenta_origen);
        $movimiento = new Movimientos();
        $movimiento->id_cuenta = $request->id_cuenta;
        $movimiento->tipo_operacion = 2;
        $movimiento->monto = $request->monto;
        $movimiento->fecha_operacion = today();
        $movimiento->cajero_operacion = session()->get('id_empleado_usuario');
        $movimiento->id_caja = $request->id_caja;
        $movimiento->estado = 1;
        $movimiento->save();
        $cuentaOrigenDatos->saldo_cuenta = $cuentaOrigenDatos->saldo_cuenta - $request->monto;
        $cuentaOrigenDatos->save();
        return redirect("/movimientos");

    }

    public function put(Request $request)
    {
        $cliente = Cuentas::findOrFail($request->id);
        if ($cliente->dui_cliente != $request->dui_cliente) {
            $cliente = Cuentas::where("dui_cliente", $request->dui_cliente)->first();
            if ($cliente && $cliente->count() > 0) {
                return redirect("/movimientos/" . $request->id)->withInput()->withErrors(["dui_cliente" => "Cambió el DUI y el ingresado ya existe en otro cliente!!"]);
            }
        } else {
            $cliente->nombre = $request->nombre;
            $cliente->genero = $request->genero;
            $cliente->fecha_nacimiento = $request->fecha_nacimiento;
            $cliente->dui_cliente = $request->dui_cliente;
            $cliente->dui_extendido = $request->dui_extendido;
            $cliente->fecha_expedicion = $request->fecha_expedicion;
            $cliente->telefono = $request->telefono;
            $cliente->nacionalidad = $request->nacionalidad;
            $cliente->estado_civil = $request->estado_civil;
            $cliente->direccion_personal = $request->direccion_personal;
            $cliente->direccion_negocio = $request->direccion_negocio;
            $cliente->nombre_negocio = $request->nombre_negocio;
            $cliente->tipo_vivienda = $request->tipo_vivienda;
            $cliente->observaciones = $request->observaciones;
            $cliente->estado = 1;
            $cliente->save();
            return redirect("/movimientos");
        }

    }
}