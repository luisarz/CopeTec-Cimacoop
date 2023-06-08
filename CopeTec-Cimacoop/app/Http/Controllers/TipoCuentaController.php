<?php

namespace App\Http\Controllers;

use App\Models\TipoCuenta;
use Illuminate\Http\Request;

class TipoCuentaController extends Controller
{
    public function index()
    {
        $tipoCuentas = TipoCuenta::paginate(10);
        return view("tipoCuenta.index", compact("tipoCuentas"));
    }

    public function add()
    {
        return view("tipoCuenta.add");
    }

    public function edit($id)
    {
        $tipoCuenta = TipoCuenta::findOrFail($id);
        return view("tipoCuenta.edit", compact("tipoCuenta"));
    }


    public function post(Request $request)
    {
        $tipoCuenta = new TipoCuenta();
        $tipoCuenta->descripcion_cuenta = $request->name;
        $tipoCuenta->estado = 1;

        $tipoCuenta->save();
        return redirect("/tipoCuenta");
    }

    public function delete(Request $request)
    {
        TipoCuenta::destroy($request->id);
        return redirect("/tipoCuenta");
    }

    public function put(Request $request)
    {
        $tipoCuenta = TipoCuenta::findOrFail($request->id);
        $tipoCuenta->descripcion_cuenta = $request->name;
        $tipoCuenta->save();
        return redirect("/tipoCuenta");
    }
}
