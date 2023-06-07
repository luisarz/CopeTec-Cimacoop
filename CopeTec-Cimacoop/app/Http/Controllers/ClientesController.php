<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Clientes::All();
        return view("clientes.index", compact("clientes"));
    }

    public function add()
    {
        return view("clientes.add");
    }

    public function edit($id)
    {
        $cliente = Clientes::findOrFail($id);
        return view("clientes.edit", compact("cliente"));
    }


    public function post(Request $request)
    {
        $cliente = new Clientes();
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
        return redirect("/clientes");
    }

    public function delete(Request $request)
    {
        Clientes::destroy($request->id);
        return redirect("/clientes");
    }

    public function put(Request $request)
    {
        $cliente = Clientes::findOrFail($request->id);
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
        return redirect("/clientes");
    }
}
