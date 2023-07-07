<?php

namespace App\Http\Controllers;

use App\Models\BeneficiarosDepositos;
use App\Models\DepositosPlazo;
use App\Models\Parentesco;
use Illuminate\Http\Request;

class BeneficiarosDepositosController extends Controller
{
    //
    public function indexBeneficiarios($id)
    {
        $beneficiarios = BeneficiarosDepositos::where('id_deposito', '=', $id)
        ->join('parentesco','parentesco.id_parentesco','=','beneficiarios_depositos.parentesco')->get();

        $tieneBeneficiarios = true;
        if ($beneficiarios->isEmpty()) {
           $beneficiarios=null;
           $tieneBeneficiarios = false;
        }


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
    public function add($id_deposito){

        $totalAsignado = BeneficiarosDepositos::where('id_deposito', '=', $id_deposito)
            ->sum('porcentaje');
        $parentescos = Parentesco::all();

        return view("captaciones.beneficiarios.add",compact("id_deposito", "totalAsignado",  'parentescos'));

    }

    public function post(Request $request){
    
        $beneficiarioDeposito = new BeneficiarosDepositos();
        $beneficiarioDeposito->id_deposito = $request->id_deposito;
        $beneficiarioDeposito->nombre_beneficiario = $request->nombre_beneficiario;
        $beneficiarioDeposito->edad = $request->edad;
        $beneficiarioDeposito->parentesco = $request->parentesco;
        $beneficiarioDeposito->porcentaje = $request->porcentaje;
        $beneficiarioDeposito->direccion = $request->direccion;
        $beneficiarioDeposito->telefono = $request->telefono;
        $beneficiarioDeposito->save();
       return redirect('captaciones/depositosplazo/'. $request->id_deposito.'/beneficiarios');

    }
    public function edit($id_beneficiario)
    {
        $beneficiario = BeneficiarosDepositos::findOrFail($id_beneficiario);
        $id_deposito = $beneficiario->id_deposito;
        $parentescos = Parentesco::all();

        $totalAsignado = BeneficiarosDepositos::where('id_deposito', '=', $id_deposito)
            ->sum('porcentaje');
        return view("/captaciones/beneficiarios/edit", compact("beneficiario", "totalAsignado",'id_deposito', 'parentescos'));
    }

    public function put(Request $request){


        $beneficiarioDeposito = BeneficiarosDepositos::findOrFail($request->id_beneficiario);
        $beneficiarioDeposito->nombre_beneficiario = $request->nombre_beneficiario;
        $beneficiarioDeposito->edad = $request->edad;
        $beneficiarioDeposito->parentesco = $request->parentesco;
        $beneficiarioDeposito->porcentaje = $request->porcentaje;
        $beneficiarioDeposito->direccion = $request->direccion;
        $beneficiarioDeposito->telefono = $request->telefono;
        $beneficiarioDeposito->save();
        return redirect('/captaciones/depositosplazo/'. $request->id_deposito.'/beneficiarios');

    }
    public function delete(Request $request){
        $id = $request->id;
        BeneficiarosDepositos::destroy($id);
        return redirect("/captaciones/depositosplazo/".$request->id_deposito_plazo_fijo."/beneficiarios");

    }
}