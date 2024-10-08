<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DataTables;
use App\Models\Profesion;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Clientes::where('nombre', '!=', 'Bobeda General')
        ->latest()->get();
        return view("clientes.index",compact("clientes"));
    }

    public function getClientes(Request $request)
    {
        if ($request->ajax()) {
            $data = Clientes::where('nombre', '!=', 'Bobeda General')
                ->latest()->get();
            return \Yajra\DataTables\DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0);" onclick="alertDelete(' . $row->id_cliente . ',' . $row->estado . ')"
                    class="btn btn-sm btn-danger">
                    <i class="ki-outline ki-lock-3  text-white"></i>
                </a>
                <a href="/clientes/' . $row->id_cliente . '" class="btn btn-sm btn-info"><i
                        class="fa-solid fa-pencil text-white"></i>
                </a>
                <a href="/alerts/client/' . $row->id_cliente . '" target="_blank"
                    class="btn btn-sm btn-success"><i class="fa-solid fa-print text-white"></i>
                </a>';
                    return $actionBtn;
                })
                ->addColumn('genero_row', function ($row) {
                    return $row->genero == 1 ? "Masculino" : "Femenino";
                })
                ->addColumn('estado_row', function ($row) {
                    return $row->estado == 1 ? '<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Inactivo</span>';
                }

                )

                ->rawColumns(['action', 'genero_row', 'estado_row'])
                ->make(true);
        }
    }

    public function add()
    {
        $profesiones = Profesion::all();
        return view("clientes.add",compact("profesiones"));
    }

    public function edit($id)
    {
        $cliente = Clientes::findOrFail($id);
        $profesiones = Profesion::all();
        // dd($profesiones);
        return view("clientes.edit", compact("cliente","profesiones"));
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
            $cliente->profesion_id = $request->profesion_id;
            $cliente->estado = 1;
            $cliente->conyugue = $request->conyugue;
            $cliente->id_empleado = auth()->user()->id_empleado_usuario;
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
        $cliente = Clientes::findOrFail($request->id);
        if ($cliente) {
            $cliente->estado = ($cliente->estado == 1) ? 0 : 1;
            $cliente->save();
        }

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
            $cliente->profesion_id = $request->profesion_id;
            $cliente->observaciones = $request->observaciones;
            $cliente->estado = 1;
            $cliente->conyugue = $request->conyugue;
            
            $cliente->save();
            return redirect("/clientes");
        }
    }

    public function solicitudIngreso($id)
    {
        $cliente = Clientes::findOrFail($id);
        return view("clientes.solicitud", compact("cliente"));
    }
}
