<?php

namespace App\Http\Controllers;

use App\Models\Bobeda;
use App\Models\BobedaMovimientos;
use App\Models\Cajas;
use App\Models\Cuentas;
use App\Models\Movimientos;
use App\Models\TipoCuenta;
use Illuminate\Http\Request;

class BobedaController extends Controller
{
    public function index()
    {
        $movimientoBobeda = BobedaMovimientos::join('cajas','cajas.id_caja','bobeda_movimientos.id_caja')
        ->where('bobeda_movimientos.created_at','>',today())
        ->paginate(10);
        $bobeda = Bobeda::first();
        return view("bobeda.index", compact("movimientoBobeda",'bobeda'));
    }

    public function add()
    {
        $asociados = Cajas::join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')->get();
        $tiposcuentas = TipoCuenta::all();
        return view("bobeda.add", compact("asociados", "tiposcuentas"));
    }

    public function transferir($id)
    {
        $bobeda = Bobeda::findOrFail($id);
        $cajas=Cajas::all();
        return view("bobeda.transferir", compact("bobeda","cajas"));
    }

    public function realizarTraslado(Request $request)
    {

        $bobeda =  Bobeda::first();
        if($bobeda->saldo_bobeda>=$request->monto){
            $bobedaMovimiento = new BobedaMovimientos();
            $bobedaMovimiento->id_bobeda = $request->id_bobeda;
            $bobedaMovimiento->id_caja = $request->id_caja;
            $bobedaMovimiento->tipo_operacion = $request->tipo_operacion;
            $bobedaMovimiento->estado = 1;
            $bobedaMovimiento->monto = $request->monto;
            $bobedaMovimiento->observacion = $request->observacion;
            $bobedaMovimiento->save();
            $movimientoBobeda = BobedaMovimientos::paginate(10);
            $bobeda->saldo_bobeda = $bobeda->saldo_bobeda - $request->monto;
            $bobeda->save();
            return view("bobeda.index", compact("movimientoBobeda", "bobeda"));
        }
        return redirect("/bobeda/transferir/$request->id_bobeda")->withInput()->withErrors(['Monto' => 'El monto que intentas enviar sobrepasa el limite']);




    }
    public function recibir($id)
    {
        $cliente = Cuentas::findOrFail($id);
        return view("bobeda.edit", compact("cliente"));
    }


    public function post(Request $request)
    {
        $cuenta = Cuentas::where("id_asociado", $request->id_asociado)
            ->where('id_tipo_cuenta', $request->id_tipo_cuenta)
            ->where('numero_cuenta', $request->numero_cuenta)
            ->first();
        if ($cuenta && $cuenta->count() > 0) {
            return redirect("/bobeda/add")->withInput()->withErrors(["dui_cliente" => "Ya existe un cliente con este DUI!!"]);
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
            return redirect("/bobeda");
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
