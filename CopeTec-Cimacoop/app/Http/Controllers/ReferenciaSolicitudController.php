<?php

namespace App\Http\Controllers;

use App\Models\ReferenciaSolicitud;
use Illuminate\Http\Request;

class ReferenciaSolicitudController extends Controller
{
    public function addReferencia($id_refrencia, $idSolicitud)
    {
        $referencia = new ReferenciaSolicitud();
        $referencia->id_solicitud = $idSolicitud;
        $referencia->id_referencia = $id_refrencia;
        $referencia->save();

        $referencias = ReferenciaSolicitud::join('referencias', 'referencias.id_referencia', '=', 'referencia_solicitud.id_referencia')
            ->where('referencia_solicitud.id_solicitud', '=', $idSolicitud)->get();


        return response()->json([
            'success' => true,
            'message' => 'Referencia agregada correctamente',
            'referencias' => $referencias
        ]);

    }

    public function quitar($id){
        $referenciaQuitar = ReferenciaSolicitud::find($id);
        $id_solicitud=$referenciaQuitar->id_solicitud;

        $referenciaQuitar->delete();

        $referencias = ReferenciaSolicitud::join('referencias', 'referencias.id_referencia', '=', 'referencia_solicitud.id_referencia')
            ->where('referencia_solicitud.id_solicitud', '=', $id_solicitud)->get();

        return response()->json([
            'success' => true,
            'message' => 'Referencia eliminada correctamente',
            'referencias' => $referencias
        ]);

    }

    public function getReferencias($idSolicitud){
        $referencias = ReferenciaSolicitud::join('referencias', 'referencias.id_referencia', '=', 'referencia_solicitud.id_referencia')
            ->where('referencia_solicitud.id_solicitud', '=', $idSolicitud)->get();

        return response()->json([
            'success' => true,
            'message' => 'Referencias obtenidas correctamente',
            'referencias' => $referencias
        ]);
    }
}