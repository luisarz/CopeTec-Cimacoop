<?php

namespace App\Http\Controllers;

use App\Models\InteresesTipoCuenta;
use App\Models\TipoCuenta;
use Illuminate\Http\Request;

class InteresesTipoCuentaController extends Controller
{
    public function index($id_tipo_cuenta = null)
    {
        $interesesAsignados = TipoCuenta::join('intereses_tipo_cuenta', 'intereses_tipo_cuenta.id_tipo_cuenta', '=', 'tipos_cuentas.id_tipo_cuenta')
            ->where('tipos_cuentas.id_tipo_cuenta', '=', $id_tipo_cuenta)->get();
        if (is_null($interesesAsignados)) {
            $interesesAsignados = null;
        }
        return view("intereses.index", compact("id_tipo_cuenta", "interesesAsignados"));

    }
    public function getIntereses($id_tipo_cuenta)
    {
        $intereses=  InteresesTipoCuenta::where('id_tipo_cuenta', '=',$id_tipo_cuenta)->get();
        if (is_null($intereses)) {
            $intereses = null;
        }
        return response()->json($intereses);
    }

    public function add($id_tipo_cuenta)
    {

        return view("intereses.add", compact("id_tipo_cuenta"));
    }

    public function edit($id)
    {
        $interes = InteresesTipoCuenta::findOrFail($id);
        return view("intereses.edit", compact("interes"));
    }


    public function post(Request $request)
    {
        $interes = new InteresesTipoCuenta();
        $interes->id_tipo_cuenta = $request->id_tipo_cuenta;
        $id_tipo_cuenta = $request->id_tipo_cuenta;
        $interes->interes = $request->interes;
        $interes->save();
        return redirect("/intereses/$id_tipo_cuenta");
    }

    public function delete(Request $request)
    {
        $beneficiario = InteresesTipoCuenta::findOrFail($request->id);

        $id_tipo_cuenta = $beneficiario->id_tipo_cuenta;
        InteresesTipoCuenta::destroy($request->id);
        return redirect("/intereses/$id_tipo_cuenta");
    }

    public function put(Request $request)
    {
        $interes = InteresesTipoCuenta::findOrFail($request->id);
        $interes->interes = $request->interes;
       $id_tipo_cuenta= $interes->id_tipo_cuenta;
        $interes->interes = $request->interes;
        $interes->save();
        return redirect("/intereses/$id_tipo_cuenta");
    }
}