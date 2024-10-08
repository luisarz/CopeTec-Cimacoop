<?php

namespace App\Http\Controllers;
use App\Models\Empleados;
use App\Models\Profesion;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    //
    public function index()
    {
        $empleados = Empleados::with('profesionEmpleado')->paginate(10);
//        dd($empleados);
        return view("empleados.index", compact("empleados"));
    }

    public function add()
    {
        $profesiones=Profesion::all();
        return view("empleados.add",compact("profesiones"));
    }

    public function edit($id)
    {
        $empleado = Empleados::findOrFail($id);
        $profesiones=Profesion::all();
        return view("empleados.edit", compact("empleado","profesiones"));
    }


    public function post(Request $request)
    {
        $empleado = new Empleados();
        $empleado->nombre_empleado = $request->nombre_empleado;
        $empleado->genero_empleado = $request->genero_empleado;
        $empleado->estado_familiar = $request->estado_familiar;
        $empleado->profesion_id = $request->profesion_id;
        $empleado->domicilio_departamento = $request->domicilio_departamento;
        $empleado->direccion = $request->direccion;
        $empleado->nacionalidad = $request->nacionalidad;
        $empleado->dui = $request->dui;
        $empleado->expedicion_dui = $request->expedicion_dui;
        $empleado->nit = $request->nit;
        $empleado->otros_datos = $request->otros_datos;
        $empleado->estado = 1;
        $empleado->save();
        return redirect("/empleados");
    }

    public function delete(Request $request)
    {
        Empleados::destroy($request->id);
        return redirect("/empleados");
    }

    public function put(Request $request)
    {
        $empleado = Empleados::findOrFail($request->id);
        $empleado->nombre_empleado = $request->nombre_empleado;
        $empleado->genero_empleado = $request->genero_empleado;
        $empleado->estado_familiar = $request->estado_familiar;
        $empleado->profesion_id = $request->profesion_id;
        $empleado->domicilio_departamento = $request->domicilio_departamento;
        $empleado->direccion = $request->direccion;
        $empleado->nacionalidad = $request->nacionalidad;
        $empleado->dui = $request->dui;
        $empleado->expedicion_dui = $request->expedicion_dui;
        $empleado->nit = $request->nit;
        $empleado->otros_datos = $request->otros_datos;
        $empleado->estado = 1;
        $empleado->save();
        return redirect("/empleados");
    }
}
