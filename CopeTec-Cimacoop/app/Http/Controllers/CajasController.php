<?php

namespace App\Http\Controllers;

use App\Models\Cajas;
use App\Models\User;
use Illuminate\Http\Request;

class CajasController extends Controller
{
    public function index()
    {

        $cajas = Cajas::join('users', 'cajas.id_usuario_asignado', '=', 'users.id_empleado_usuario')
            ->join('empleados', 'users.id_empleado_usuario', 'empleados.id_empleado')
            ->select('cajas.*', 'users.id_empleado_usuario', 'empleados.nombre_empleado', 'empleados.dui')
            ->distinct()
            ->paginate(10);
        return view("cajas.index", compact("cajas"));
    }

    public function add()
    {
        $users = User::join('empleados', 'users.id_empleado_usuario', '=', 'empleados.id_empleado')
            ->distinct()
            ->get();
        return view("cajas.add", compact("users"));
    }

    public function edit($id)
    {
        $caja = Cajas::FindorFail($id);
        $usuarios = User::join('empleados', 'users.id_empleado_usuario', '=', 'empleados.id_empleado')
            ->select('users.id', 'users.id_empleado_usuario as userId', 'empleados.id_empleado as empleadoId', 'empleados.nombre_empleado', 'empleados.dui')
            ->distinct()
            ->get();
        return view("cajas.edit", compact("caja", "usuarios"));
    }


    public function post(Request $request)
    {

        $caja = Cajas::where("numero_caja", $request->numero_caja)->first();
        $cajeros = Cajas::where("id_usuario_asignado", $request->id_usuario_asignado)->first();
        if (($caja && $caja->count() > 0) || ($cajeros && $cajeros->count() > 0)) {
            return redirect("/cajas/add")->withInput()->withErrors(["numero_caja" => "La caja ya existe o el cajero ya tiene una caja asignada"]);
        } else {
            $caja = new Cajas();
            $caja->numero_caja = $request->numero_caja;
            $caja->id_usuario_asignado = $request->id_usuario_asignado;
            $caja->estado_caja = 0;
            $caja->save();
            return redirect("/cajas");
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id_caja;
        Cajas::destroy($request->id_caja);
        return redirect("/cajas");
    }

    public function put(Request $request)
    {
        $caja = Cajas::findOrFail($request->id);
        $caja->numero_caja = $request->numero_caja;
        $caja->id_usuario_asignado = $request->id_usuario_asignado;
        $caja->save();
        return redirect("/cajas");
    }
}