<?php

namespace App\Http\Controllers;

use App\Models\Beneficiarios;
use App\Models\Clientes;
use App\Models\Referencias;
use App\Models\SolicitudCredito;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SolicitudCreditoController extends Controller
{
    //
    public function index()
    {
        $solicitudes = SolicitudCredito::join('clientes', 'clientes.id_cliente', '=', 'solicitud_credito.id_cliente')
            ->orderBy('solicitud_credito.fecha_solicitud')
            ->select(
                'solicitud_credito.*',
                'clientes.nombre'
            )->paginate(10);
     

        return view('creditos.solicitudes.index', compact('solicitudes'));
    }
    public function add()
    {
        $clientes = Clientes::whereNotIn('estado', [0, 7])->get();
        $beneficiarios = Beneficiarios::all();
        $idSolicitud = Str::uuid()->toString();
        $referencias = Referencias::select(
            'id_referencia'
            ,
            'nombre'
            ,
            'parentesco'
            ,
            'dui'
            ,
            'lugar_trabajo'
        )->get();

        return view('creditos.solicitudes.add', compact('clientes', 'beneficiarios', 'idSolicitud', 'referencias'));
    }


    public function post(Request $request)
    {

        $solicitud = new SolicitudCredito();
        $solicitud->id_solicitud = $request->id_solicitud;
        $numeroSolicitud = SolicitudCredito::max('numero_solicitud');

        $solicitud->numero_solicitud = $numeroSolicitud + 1;
        $solicitud->id_cliente = $request->id_cliente;
        $solicitud->id_socio = null;
        $solicitud->monto_solicitado = $request->monto_solicitado;
        $solicitud->fecha_solicitud = $request->fecha_solicitud;
        $solicitud->plazo = $request->plazo;
        $solicitud->tasa = $request->tasa;
        $solicitud->cuota = $request->cuota;
        $solicitud->aportaciones = $request->aportaciones;
        $solicitud->seguro_deuda = $request->seguro_deuda;
        $solicitud->destino = $request->destino;
        $solicitud->garantia = $request->garantia;
        $solicitud->id_conyugue = $request->id_conyugue;
        $solicitud->empresa_labora = $request->empresa_labora;
        $solicitud->sueldo_conyugue = $request->sueldo_conyugue;
        $solicitud->tiempo_laborando = $request->tiempo_laborando;
        $solicitud->sueldo = $request->sueldo;
        $solicitud->cargo = $request->cargo;
        $solicitud->telefono_trabajo = $request->telefono_trabajo;
        $solicitud->sueldo_solicitante = $request->sueldo_solicitante;
        $solicitud->comisiones = $request->comisiones;
        $solicitud->negocio_propio = $request->negocio_propio;
        $solicitud->otros_ingresos = $request->otros_ingresos;
        $solicitud->total_ingresos = $request->total_ingresos;
        $solicitud->gastos_vida = $request->gastos_vida;
        $solicitud->pagos_obligaciones = $request->pagos_obligaciones;
        $solicitud->gastos_negocios = $request->gastos_negocios;
        $solicitud->otros_gastos = $request->otros_gastos;
        $solicitud->total_gasto = $request->total_gasto;
        $solicitud->estado = 1; //Presentada
        $solicitud->save();

        return redirect('/creditos/solicitudes');
    }
}