<?php

namespace App\Http\Controllers;

use App\Models\DeclaracionJurada;
use App\Models\Cuentas;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DeclaracionJuradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $rq)
    {
        $dec = new DeclaracionJurada();
        $acc = Cuentas::find($rq->acc);
        return view('declaracion.declare', compact('acc', 'dec'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dec = new DeclaracionJurada();
        $dec->lugar = "San Miguel";
        $dec->fecha = Carbon::now();
        $dec->id_cuenta = $request->id_cuenta;
        $dec->id_cliente = $request->id_cliente;
        $dec->n_depositos = $request->n_depositos;
        $dec->val_prom_depositos = $request->val_prom_depositos;
        $dec->depo_tipo = $request->depo_tipo;
        $dec->n_retiros = $request->n_retiros;
        $dec->val_prom_retiros = $request->val_prom_retiros;
        $dec->ret_tipo = $request->ret_tipo;
        $dec->origen_fondos = $request->origen_fondos;
        $dec->otro_origen_fondos = $request->otro_origen_fondos;
        $dec->comprobante_procedencia_fondo = $request->comprobante_procedencia_fondo;
        $dec->otro_comprobante_fondos = $request->otro_comprobante_fondos;
        $acc = Cuentas::find($request->id_cuenta);
        $acc->declarado = true;
        try {
            $dec->save();
            $acc->save();
            return redirect('/cuentas');
        } catch (\Throwable $th) {
            dd($th);
            return redirect("/declare/" . $request->id_cuenta . "/add")->withInput()->withErrors(["Error" => $th]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(DeclaracionJurada $declaracionJurada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

        $dec = DeclaracionJurada::where('id_cuenta', $request->acc)->first();
        $acc = Cuentas::find($request->acc);
        return view('declaracion.declare', compact('acc', 'dec'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DeclaracionJurada $declaracionJurada)
    {
        $dec = DeclaracionJurada::find($request->declaracion_id);
        // $dec = $declaracionJurada;
        $dec->id_cuenta = $request->id_cuenta;
        $dec->id_cliente = $request->id_cliente;
        $dec->n_depositos = $request->n_depositos;
        $dec->val_prom_depositos = $request->val_prom_depositos;
        $dec->depo_tipo = $request->depo_tipo;
        $dec->n_retiros = $request->n_retiros;
        $dec->val_prom_retiros = $request->val_prom_retiros;
        $dec->ret_tipo = $request->ret_tipo;
        $dec->origen_fondos = $request->origen_fondos;
        $dec->otro_origen_fondos = $request->otro_origen_fondos;
        $dec->comprobante_procedencia_fondo = $request->comprobante_procedencia_fondo;
        $dec->otro_comprobante_fondos = $request->otro_comprobante_fondos;
        try {
            $dec->save();
            return redirect('/cuentas');
        } catch (\Throwable $th) {
            dd($th);
            return redirect("/declare/" . $request->id_cuenta . "/add")->withInput()->withErrors(["Error" => $th]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeclaracionJurada $declaracionJurada)
    {
        //
    }
}
