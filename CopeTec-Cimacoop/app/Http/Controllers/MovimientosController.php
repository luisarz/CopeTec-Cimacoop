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
        $movimientos = Movimientos::join('cuentas', 'cuentas.id_cuenta', '=', 'movimientos.id_cuenta')
            ->join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->where('movimientos.fecha_operacion', today())
            ->select('movimientos.*', 'clientes.nombre', 'tipos_cuentas.descripcion_cuenta', 'cuentas.numero_cuenta','clientes.dui_cliente')
            ->orderby('movimientos.fecha_operacion', 'asc')
            ->paginate(10);
        // dd($movimientos);

        return view("movimientos.index", compact("movimientos"));
    }

    public function add()
    {
        $asociados = Cajas::join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')->get();
        $tiposcuentas = TipoCuenta::all();
        return view("movimientos.add", compact("asociados", "tiposcuentas"));
    }

    public function edit($id)
    {
        $cliente = Cuentas::findOrFail($id);
        return view("movimientos.edit", compact("cliente"));
    }


    public function post(Request $request)
    {
        $cuenta = Cuentas::where("id_asociado", $request->id_asociado)
            ->where('id_tipo_cuenta', $request->id_tipo_cuenta)
            ->where('numero_cuenta', $request->numero_cuenta)
            ->first();
        if ($cuenta && $cuenta->count() > 0) {
            return redirect("/movimientos/add")->withInput()->withErrors(["dui_cliente" => "Ya existe un cliente con este DUI!!"]);
        } else {
            $cuenta = new Cuentas();
            $cuenta->id_asociado = $request->id_asociado;
            $cuenta->id_tipo_cuenta = $request->id_tipo_cuenta;
            $cuenta->numero_cuenta = $request->numero_cuenta;
            $cuenta->monto_apertura = $request->monto_apertura;
            $cuenta->fecha_apertura = $request->fecha_apertura;
            $cuenta->saldo_cuenta = $request->monto_apertura;
            $cuenta->id_interes = $request->id_interes;
            $cuenta->estado = 1;
            $cuenta->save();
            return redirect("/movimientos");
        }

    }

    public function delete(Request $request)
    {
        Cuentas::destroy($request->id);
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
