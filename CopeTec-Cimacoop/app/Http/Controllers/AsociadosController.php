<?php

namespace App\Http\Controllers;

use App\Models\Asociados;
use App\Models\Clientes;
use Illuminate\Http\Request;

class AsociadosController extends Controller
{
    public function index()
    {
        $asociados = Asociados::join('clientes', 'asociados.id_cliente', '=', 'clientes.id_cliente')
        ->whereNotIn('clientes.estado',[0,7])
        ->paginate(10);
   
        return view("asociados.index", compact("asociados"));
    }

    public function add()
    {
        $clientes = Clientes::All();
        $asociados = Asociados::join('clientes', 'asociados.id_cliente', '=', 'clientes.id_cliente')->get();
        return view("asociados.add", compact("clientes", "asociados"));
    }

    public function edit($id)
    {
        $asociado = Asociados::findOrFail($id);
        $clientes = Clientes::All();
        $asociados = Asociados::join('clientes', 'asociados.id_cliente', '=', 'clientes.id_cliente')->get();
        return view("asociados.edit", compact("asociado", "asociados","clientes"));
    }


    public function post(Request $request)
    {

        $asociado = new Asociados();
        $asociado->id_cliente = $request->id_cliente;
        $asociado->sueldo_quincenal = $request->sueldo_quincenal;
        $asociado->sueldo_mensual = $request->sueldo_mensual;
        $asociado->otros_ingresos = $request->otros_ingresos;
        $asociado->dependientes_economicamente = $request->dependientes_economicamente;
        $asociado->referencia_asociado_uno = $request->referencia_asociado_uno;
        $asociado->referencia_asociado_dos = $request->referencia_asociado_dos;
        $asociado->couta_ingreso = $request->couta_ingreso;
        $asociado->monto_aportacion = $request->monto_aportacion;
        $asociado->fecha_ingreso=$request->fecha_ingreso;
        $asociado->estado_solicitud = 1;
        $asociado->save();
        return redirect("/asociados");
    }

    public function delete(Request $request)
    {
        Asociados::destroy($request->id);
        return redirect("/asociados");
    }

    public function put(Request $request)
    {
        $asociado = Asociados::findOrFail($request->id);
        $asociado->id_cliente = $request->id_cliente;
        $asociado->sueldo_quincenal = $request->sueldo_quincenal;
        $asociado->sueldo_mensual = $request->sueldo_mensual;
        $asociado->otros_ingresos = $request->otros_ingresos;
        $asociado->dependientes_economicamente = $request->dependientes_economicamente;
        $asociado->referencia_asociado_uno = $request->referencia_asociado_uno;
        $asociado->referencia_asociado_dos = $request->referencia_asociado_dos;
        $asociado->couta_ingreso = $request->couta_ingreso;
        $asociado->monto_aportacion = $request->monto_aportacion;
        $asociado->fecha_ingreso = $request->fecha_ingreso;
        $asociado->estado_solicitud = $request->estado_solicitud;
        $asociado->save();
        return redirect("/asociados");
    }
}
