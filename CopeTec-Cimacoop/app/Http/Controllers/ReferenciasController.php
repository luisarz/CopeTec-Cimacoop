<?php

namespace App\Http\Controllers;

use App\Models\Referencias;
use Illuminate\Http\Request;

class ReferenciasController extends Controller
{
    public function index()
    {
        $referencias = Referencias::All();
        return view("referencias.index", compact("referencias"));
    }

    public function add()
    {
        return view("referencias.add");
    }

    public function edit($id)
    {
        $referencia = Referencias::findOrFail($id);
        return view("referencias.edit", compact("referencia"));
    }


    public function post(Request $request)
    {
        $referencia = new Referencias();
        $referencia->nombre = $request->nombre;
        $referencia->parentesco = $request->parentesco;
        $referencia->telefono = $request->telefono;
        $referencia->direccion = $request->direccion;
        $referencia->lugar_trabajo = $request->lugar_trabajo;
        $referencia->observaciones = $request->observaciones;
        $referencia->estado = 1;
        $referencia->save();
        return redirect("/referencias");
    }

    public function delete(Request $request)
    {
        Referencias::destroy($request->id);
        return redirect("/referencias");
    }

    public function put(Request $request)
    {
        $referencia = Referencias::findOrFail($request->id);
        $referencia->nombre = $request->nombre;
        $referencia->parentesco = $request->parentesco;
        $referencia->telefono = $request->telefono;
        $referencia->direccion = $request->direccion;
        $referencia->lugar_trabajo = $request->lugar_trabajo;
        $referencia->observaciones = $request->observaciones;
        $referencia->estado = 1;
        $referencia->save();
        return redirect("/referencias");
    }
}
