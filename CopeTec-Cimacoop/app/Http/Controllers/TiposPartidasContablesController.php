<?php

namespace App\Http\Controllers;

use App\Models\TiposPartidasContablesModel;
use Illuminate\Http\Request;

class TiposPartidasContablesController extends Controller
{
    public function index()
    {
        $tiposPartidas = TiposPartidasContablesModel::paginate(100);
        return view(
            "contabilidad.tipopartidascontables.index",
            compact("tiposPartidas")
        );
    }

    public function add()
    {
        return view("contabilidad.tipopartidascontables.add");
    }

    public function edit($id)
    {
        $tipoPartida = TiposPartidasContablesModel::findOrFail($id);
        return view("contabilidad.tipopartidascontables.edit", compact("tipoPartida"));
    }


    public function post(Request $request)
    {
        $tipoCuenta = new TiposPartidasContablesModel();
        $tipoCuenta->descripcion = $request->descripcion;
        $tipoCuenta->estado = 1;
        $tipoCuenta->save();
        return redirect("/contabilidad/tipos-partidas");
    }

    public function delete(Request $request)
    {
        TiposPartidasContablesModel::destroy($request->id);
        return redirect("/contabilidad/tipos-partidas");
    }

    public function put(Request $request)
    {
        $tipoCuenta = TiposPartidasContablesModel::findOrFail($request->id);
        $tipoCuenta->descripcion = $request->descripcion;
        $tipoCuenta->save();
        return redirect("/contabilidad/tipos-partidas");
    }
}