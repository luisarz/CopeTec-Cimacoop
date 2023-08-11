<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{

    public function index()
    {
        $configuracion = Configuracion::first();
        $catalogo = Catalogo::where('estado', '=', 1)->get();

        return view('configuracion.index', compact('configuracion', 'catalogo'));

    }






    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {


        $configuracion = Configuracion::find(1);
        $configuracion->nombre_empresa = $request->nombre_empresa;
        $configuracion->nombre_comercial = $request->nombre_comercial;
        $configuracion->rubro = $request->rubro;
        $configuracion->nrc = $request->nrc;
        $configuracion->nit = $request->nit;
        $configuracion->correo = $request->correo;
        $configuracion->telefono = $request->telefono;
        $configuracion->direccion = $request->direccion;
        $configuracion->dias_gracia = $request->dias_gracia;
        $configuracion->interes_moratorio = $request->interes_moratorio;
        $configuracion->consulta_crediticia = $request->consulta_crediticia;

        $configuracion->monto_deposito_credito = $request->monto_deposito_credito;
        $configuracion->cuenta_tipo_credito = $request->cuenta_tipo_credito;
        $configuracion->cuenta_aportacion = $request->cuenta_aportacion;
        $configuracion->cuenta_interes_credito = $request->cuenta_interes_credito;
        $configuracion->cuenta_interes_credito_moratorio = $request->cuenta_interes_credito_moratorio;

        $configuracion->deposito_cuenta_debe = $request->deposito_cuenta_debe;
        $configuracion->deposito_cuenta_haber = $request->deposito_cuenta_haber;
        $configuracion->retiro_cuenta_debe = $request->retiro_cuenta_debe;
        $configuracion->retiro_cuenta_haber = $request->retiro_cuenta_haber;




        $configuracion->save();
        return redirect('/configuracion');
    }


}