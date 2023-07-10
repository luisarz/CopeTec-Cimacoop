<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Clientes::whereNotIn('estado', [0, 7])->paginate(10); // 1-Para los anulados 2-Para la Bobeda
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
        $cliente = Clientes::where("dui_cliente", $request->dui_cliente)->first();
        if ($cliente && $cliente->count() > 0) {
            return redirect("/clientes/add")->withInput()->withErrors(["dui_cliente" => "Ya existe un cliente con este DUI!!"]);
        } else {
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

    }
    public function getClienteData($id)
    {
        try {
            $cliente = Clientes::findOrFail($id);
            return response()->json([
                "estado" => true,
                "cliente" => $cliente
            ]);
        } catch (ModelNotFoundException $ex) {
            return response()->json([
                "estado" => false,
                "mensaje" => "No se encontró el cliente"
            ]);
        }

    }
    public function delete(Request $request)
    {
        Clientes::destroy($request->id);
        return redirect("/clientes");
    }

    public function put(Request $request)
    {
        $cliente = Clientes::findOrFail($request->id);
        if ($cliente->dui_cliente != $request->dui_cliente) {
            $cliente = Clientes::where("dui_cliente", $request->dui_cliente)->first();
            if ($cliente && $cliente->count() > 0) {
                return redirect("/clientes/" . $request->id)->withInput()->withErrors(["dui_cliente" => "Cambió el DUI y el ingresado ya existe en otro cliente!!"]);
            }
            //Aqui debe guardar si no se ha cambiado el dui
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
            return redirect("/clientes");
        }

    }
}