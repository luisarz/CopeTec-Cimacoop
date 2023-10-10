<?php

namespace App\Http\Controllers;

use App\Models\Cajas;
use App\Models\CorrelativosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CorrelativosController extends Controller
{
    public function index($id_caja)
    {
        Session::put("estadoMenuminimizado", "0");

        $correlativos = CorrelativosModel::join('cajas', 'cajas.id_caja', '=', 'correlativos.id_caja')
            ->where('correlativos.id_caja', '=', $id_caja)
            ->get();
        return view('cajas.correlativos.index', compact('correlativos', 'id_caja'));
    }

    public function edit($id_correlativo)
    {
        $correlativo = CorrelativosModel::join('cajas', 'cajas.id_caja', '=', 'correlativos.id_caja')
            ->where('correlativos.id_correlativo', '=', $id_correlativo)
            ->first();
        return view('cajas.correlativos.edit', compact('correlativo'));
    }
    public function put(Request $request)
    {

        $correlativo = CorrelativosModel::findOrFail($request->id_correlativo);
        $id_caja = $request->id_caja;
        if ($correlativo) {
            $correlativo->resolucion = $request->resolucion;
            $correlativo->tipo_documento = $request->tipo_documento;
            $correlativo->documento_inicial = $request->documento_inicial;
            $correlativo->documento_final = $request->documento_final;
            $correlativo->ultimo_emitido = $request->ultimo_emitido;
            $correlativo->estado = $request->estado;
            $correlativo->save();
        }
        return redirect('/correlativos/caja/' . $id_caja . '/list');
    }

    public function add($id_caja)
    {
        $caja = Cajas::findOrFail($id_caja);
        return view('cajas.correlativos.add', compact('id_caja', 'caja'));
    }

    public function post(Request $reques)
    {
        $id_caja = $reques->id_caja;
        $tipo_documento = $reques->tipo_documento;
        $correlativo = CorrelativosModel::where("id_caja", $id_caja)
            ->where('tipo_documento', $tipo_documento)->first();


        if (($correlativo && $correlativo->count() > 0)) {
            return redirect("/correlativos/caja/".$id_caja."/add")->withInput()
            ->withErrors(["caja:" => "El tipo de documento ya existe en la caja seleccionada"]);
        } else {
            //registramos el correlativo
            return redirect("/cajas");
        }
    }

    public function getNumFactura($tipo_documento){
        $correlativo = CorrelativosModel::where("tipo_documento", $tipo_documento)->first();
        if($correlativo){
            $ultimo_emitido = $correlativo->ultimo_emitido;
            $ultimo_emitido = $ultimo_emitido + 1;
            // $correlativo->ultimo_emitido = $ultimo_emitido;
            // $correlativo->save();
            return response()->json([
                'ultimo_emitido' => $ultimo_emitido
            ]);
        }else{
            $ultimo_emitido = 0;
            return response()->json([
                'ultimo_emitido' => $ultimo_emitido
            ]);
        }

    }
}