<?php

namespace App\Http\Controllers;

use App\Models\SolicitudCreditoBienes;
use Illuminate\Http\Request;

class SolicitudCreditoBienesController extends Controller
{
    public function addBien(Request $request){
        $bienSolicitud = new SolicitudCreditoBienes();
        $bienSolicitud->clase_propiedad = $request->clase_propiedad;
        $bienSolicitud->direccion = $request->direccion_bien;
        $bienSolicitud->id_solicitud = $request->id_solicitud;
        $bienSolicitud->valor = $request->valor;
        $bienSolicitud->hipotecado_bien = $request->hipotecado_bien;
        $bienSolicitud->save();

        $bienes = SolicitudCreditoBienes::where('id_solicitud','=', $request->id_solicitud)->get();


        return response()->json([
            'success' => true,
            'message' => 'Bien agregado correctamente',
            'bienesRegistrados' => $bienes
        ]);
    }

    public function getBienes($bienesOfertados)
    {
        $bienesOfertados = SolicitudCreditoBienes::where('id_solicitud', '=', $bienesOfertados)->get();


        return response()->json([
            'success' => true,
            'message' => 'Bienes obtenidas correctamente',
            'bienesOfertados' => $bienesOfertados
        ]);
    }

    public function quitar($id)
    {
        $bienQuitar = SolicitudCreditoBienes::find($id);
        $id_solicitud = $bienQuitar->id_solicitud;
        $bienQuitar::destroy($id);
        $bienes = SolicitudCreditoBienes::where('id_solicitud', '=', $id_solicitud)->get();

        return response()->json([
            'success' => true,
            'message' => 'Bien Removido correctamente',
            'bienesRegistrados' => $bienes
        ]);

    }
}
