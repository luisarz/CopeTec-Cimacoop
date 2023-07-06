<?php

namespace App\Http\Controllers;

use App\Models\BeneficiarosDepositos;
use App\Models\DepositosPlazo;
use Illuminate\Http\Request;

class BeneficiarosDepositosController extends Controller
{
    //
    public function indexBeneficiarios($id)
    {
        $beneficiarios = BeneficiarosDepositos::where('id_deposito', '=', $id)->get();
        $tieneBeneficiarios = true;
        if ($beneficiarios->isEmpty()) {
           $beneficiarios=null;
           $tieneBeneficiarios = false;
        }
        // dd($beneficiarios);


        $totalAsignado = BeneficiarosDepositos::where('id_deposito', '=', $id)
            ->sum('porcentaje');

        $depositoPlazo = DepositosPlazo::join('asociados', 'depositos_plazo.id_asociado', '=', 'asociados.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('plazos_tasas', 'plazos_tasas.id_tasa', '=', 'depositos_plazo.interes_deposito')
            ->join('cuentas', 'cuentas.id_cuenta', '=', 'depositos_plazo.id_cuenta_depositar')
            ->where('depositos_plazo.id_deposito_plazo_fijo', "=", $id)
            ->select('depositos_plazo.id_deposito_plazo_fijo', 'depositos_plazo.monto_deposito', 'depositos_plazo.fecha_deposito', 'depositos_plazo.fecha_vencimiento', 'depositos_plazo.plazo_deposito', 'depositos_plazo.numero_cheque', 'depositos_plazo.forma_deposito', 'asociados.id_asociado', 'clientes.nombre', 'plazos_tasas.valor', 'cuentas.numero_cuenta')
            ->orderBy('depositos_plazo.numero_certificado', 'desc')
            ->first();


        if (!$depositoPlazo) {
          return redirect('/captaciones/depositosplazo')->with('error', 'No se encontró el depósito');
        }

        return view('captaciones.beneficiarios.index', compact('beneficiarios', 'id', 'depositoPlazo', 'totalAsignado', 'tieneBeneficiarios'));
    }
}