<?php

namespace App\Http\Controllers;

use App\Models\ReferenciaSolicitud;
use Illuminate\Http\Request;

class ReferenciaSolicitudController extends Controller
{
    public function addReferencia($id_refrencia, $idSolicitud, $parentesco_id)
    {
        $referencia = new ReferenciaSolicitud();
        $referencia->id_solicitud = $idSolicitud;
        $referencia->id_referencia = $id_refrencia;
        $referencia->parentesco_id= $parentesco_id;
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
        $id_referencia=intval($id);
        $referenciaQuitar = ReferenciaSolicitud::find($id_referencia);
        if (!$referenciaQuitar) {
            return response()->json([
                'success' => false,
                'message' => 'Referencia no encontrada',
            ]);
        }
        $referenciaQuitar::destroy($id_referencia);
        return response()->json([
            'success' => true,
            'message' => 'Referencia eliminada correctamente',
        ]);

    }

    public function getReferencias($idSolicitud){

        $referenciasSolicitud = ReferenciaSolicitud::with([
            'referencias' => function ($query) {
                $query->select('id_referencia', 'dui', 'nombre','direccion','telefono' );
            },
            'parentesco' => function ($query) {
                $query->select('id_parentesco', 'parentesco'); // Cambia los campos según lo que necesites
            }
        ])->select('id_referencia_solicitud', 'id_referencia', 'parentesco_id'  )->where('id_solicitud', $idSolicitud)->get();

        return response()->json($referenciasSolicitud);

        $referencias = ReferenciaSolicitud::join('referencias', 'referencias.id_referencia', '=', 'referencia_solicitud.id_referencia')
            ->where('referencia_solicitud.id_solicitud', '=', $idSolicitud)->get();

        return response()->json([
            'success' => true,
            'message' => 'Referencias obtenidas correctamente',
            'referencias' => $referencias
        ]);
    }
}