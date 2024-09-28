<?php

namespace App\Http\Controllers;

use App\Models\Asociados;
use App\Models\Beneficiarios;
use App\Models\Cuentas;
use App\Models\Parentesco;
use Illuminate\Http\Request;

class BeneficiariosController extends Controller
{
    public function index($id_asociado = null)
    {
        $beneficiarios = Beneficiarios::with('cuenta', 'cuenta.tipo_cuenta')->where('id_asociado', '=', $id_asociado)
            ->join('parentesco', 'id_parentesco', '=', 'beneficiarios.parentesco')->get();

        $asociado = Asociados::join('clientes', 'asociados.id_cliente', '=', 'clientes.id_cliente')
            ->where('asociados.id_asociado', '=', $id_asociado)
            ->first();

        $totalAsignado = Beneficiarios::where('id_asociado', '=', $id_asociado)
            ->sum('porcentaje');

        $saldoDisponible = Cuentas::where('id_asociado', '=', $id_asociado)
            ->where('id_tipo_cuenta', '!=', '9')
            ->sum('saldo_cuenta');

        $saldoAportaciones = Cuentas::where('id_asociado', '=', $id_asociado)
            ->where('id_tipo_cuenta', '=', '9')
            ->sum('saldo_cuenta');

        if ($beneficiarios->isEmpty()) {
            $beneficiarios = null;
        }
        return view("beneficiarios.index", compact("beneficiarios", "id_asociado", "asociado", "totalAsignado", "saldoDisponible", "saldoAportaciones"));
    }

    public function add($id_asociado)
    {

        $totalAsignado = Beneficiarios::where('id_asociado', '=', '$id_asociado')->sum('porcentaje');
        $cuentas = Cuentas::where('cuentas.id_asociado', '=', $id_asociado)
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->get();
        $parentescos = Parentesco::all();

        return view("beneficiarios.add",
            compact(
                "id_asociado",
                "totalAsignado",
                'cuentas',
                'parentescos'
            )
        );
    }

    public function edit($id)
    {
        $beneficiario = Beneficiarios::findOrFail($id);
        $parentescos = Parentesco::all();
        return view("beneficiarios.edit", compact("beneficiario", "parentescos"));
    }


    public function post(Request $request)
    {
        $id_asociado = $request->id_asociado;
        $benenficiario = new Beneficiarios();
        $benenficiario->id_asociado = $id_asociado;
        $benenficiario->id_cuenta = $request->id_cuenta;
        $benenficiario->parentesco = $request->parentesco;
        $benenficiario->nombre = $request->nombre;
        $benenficiario->porcentaje = $request->porcentaje;
        $benenficiario->direccion = $request->direccion;
        $benenficiario->telefono = $request->telefono;
        $benenficiario->save();
        return redirect("/beneficiarios/$id_asociado");
    }

    public function delete(Request $request)
    {
        $beneficiario = Beneficiarios::findOrFail($request->id);

        $id_asociado = $beneficiario->id_asociado;
        Beneficiarios::destroy($request->id);
        return redirect("/beneficiarios/$id_asociado");
    }

    public function put(Request $request)
    {
        // dd($request->all());
        $beneficiario = Beneficiarios::findOrFail($request->id);
        $beneficiario->id_beneficiario = $request->id;
        $beneficiario->id_asociado = $request->id_asociado;
        $beneficiario->nombre = $request->nombre;
        $beneficiario->parentesco = $request->parentesco;
        $beneficiario->porcentaje = $request->porcentaje;
        $beneficiario->direccion = $request->direccion;
        $beneficiario->save();
        return redirect("/beneficiarios/$beneficiario->id_asociado");
    }
}
