<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    
    public function index()
    {
        $configuracion = Configuracion::first();
        return view('configuracion.index', compact('configuracion'));
    
    }

    




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $configuracion=Configuracion::find(1);
        $configuracion->nombre_empresa=$request->nombre_empresa;
        $configuracion->nombre_comercial=$request->nombre_comercial;
        $configuracion->rubro=$request->rubro;
        $configuracion->nrc=$request->nrc;
        $configuracion->nit=$request->nit;
        $configuracion->correo=$request->correo;
        $configuracion->telefono=$request->telefono;
        $configuracion->direccion=$request->direccion;
        $configuracion->save();
        return redirect('/configuracion');
    }

  
}
