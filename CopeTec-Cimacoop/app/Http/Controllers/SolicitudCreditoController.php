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
        $solicitudes = SolicitudCredito::join('clientes','clientes.id_cliente','=','solicitud_credito.id_cliente')
        ->orderBy('solicitud_credito.fecha_solicitud')->paginate(10);
        

        return view('creditos.solicitudes.index',compact('solicitudes'));
    }
    public function add()
    {
        $clientes = Clientes::whereNotIn('estado',[0,7])->get();
        $beneficiarios=Beneficiarios::all();
        $idSolicitud = Str::uuid()->toString();
        $referencias=Referencias::select(
            'id_referencia'
            ,'nombre'
            ,'parentesco'
            ,'dui'
            ,'lugar_trabajo')->get();




        return view('creditos.solicitudes.add',compact('clientes','beneficiarios','idSolicitud','referencias'));
    }
}
