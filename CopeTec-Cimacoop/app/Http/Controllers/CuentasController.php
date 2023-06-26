<?php

namespace App\Http\Controllers;

use App\Models\Asociados;
use App\Models\Cuentas;
use App\Models\TipoCuenta;
use Illuminate\Http\Request;

class CuentasController extends Controller
{
    public function index()
    {
        $cuentas = Cuentas::join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->whereNotIn('clientes.estado', [0, 7])
            ->distinct()
            ->orderby('clientes.nombre', 'asc')
            ->select('cuentas.*', 'clientes.nombre as nombre_cliente','clientes.dui_cliente as dui_cliente', 'tipos_cuentas.descripcion_cuenta as tipo_cuenta')
            ->paginate(10);

        return view("cuentas.index");
    }


    public function add()
    {
        $asociados = Asociados::join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->whereNotIn('clientes.estado', [0, 7])->get(); //El cliente no este desactivado ni sea la bobeda
        $tiposcuentas = TipoCuenta::all();
        return view("cuentas.add", compact("asociados", "tiposcuentas"));
    }
    public function addcuentacompartida()
    {
        $asociados = Asociados::join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->whereNotIn('clientes.estado', [0, 7])->get(); //El cliente no este desactivado ni sea la bobeda
        $tiposcuentas = TipoCuenta::all();

        return view("cuentas.addcuentacompartida", compact("asociados", "tiposcuentas"));
    }

    public function edit($id)
    {
        $cliente = Cuentas::findOrFail($id);
        return view("cuentas.edit", compact("cliente"));
    }


    public function post(Request $request)
    {
        $cuenta = Cuentas::where("id_asociado", $request->id_asociado)
            ->where('id_tipo_cuenta', $request->id_tipo_cuenta)
            ->where('numero_cuenta', $request->numero_cuenta)
            ->where('estado', 1)
            ->first();
        if ($cuenta && $cuenta->count() > 0) {
            return redirect("/cuentas/add")->withInput()->withErrors(["dui_cliente" => "Ya existe un Asociado  con este DUI!!"]);
        } else {
            $cuenta = new Cuentas();
            $cuenta->id_asociado = $request->id_asociado;
            $cuenta->id_tipo_cuenta = $request->id_tipo_cuenta;
            $cuenta->numero_cuenta = $request->numero_cuenta;
            $cuenta->monto_apertura = $request->monto_apertura;
            $cuenta->fecha_apertura = $request->fecha_apertura;
            $cuenta->saldo_cuenta = $request->monto_apertura;
            $cuenta->id_asociado_comparte = $request->id_asociado_comparte ?? null;
            $cuenta->id_interes = $request->id_interes_tipo_cuenta;
            $cuenta->estado = 1;
            $cuenta->save();
            return redirect("/cuentas");
        }

    }

    public function delete(Request $request)
    {
        Cuentas::destroy($request->id);
        return redirect("/cuentas");
    }

    public function put(Request $request)
    {
        $cliente = Cuentas::findOrFail($request->id);
        if ($cliente->dui_cliente != $request->dui_cliente) {
            $cliente = Cuentas::where("dui_cliente", $request->dui_cliente)->first();
            if ($cliente && $cliente->count() > 0) {
                return redirect("/cuentas/" . $request->id)->withInput()->withErrors(["dui_cliente" => "Cambió el DUI y el ingresado ya existe en otro cliente!!"]);
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
            return redirect("/cuentas");
        }

    }

    public function getCuenta($id)
    {
        $cuenta = Cuentas::find($id);
        $saldo_cuenta_formateado = null;
        if ($cuenta) {
            $saldo_cuenta_formateado = number_format($cuenta->saldo_cuenta, 2, '.', ',');
        }
        return response()->json([
            'saldo_cuenta_formateado' => $saldo_cuenta_formateado != null ? $saldo_cuenta_formateado : 0,
            'saldo_cuenta_sin_formato' => $cuenta ? $cuenta->saldo_cuenta : 0,
        ]);
    }
    public function anularCuenta(Request $request)
    {
        $cuenta = Cuentas::findOrFail($request->id_cuenta_anular);
        $cuenta->estado = 0;
        $cuenta->save();
        return redirect("/cuentas");
    }


}