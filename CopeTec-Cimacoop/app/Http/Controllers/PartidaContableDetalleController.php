<?php

namespace App\Http\Controllers;

use App\Models\PartidaContable;
use App\Models\PartidaContableDetalleModel;
use Illuminate\Http\Request;

class PartidaContableDetalleController extends Controller
{
    //
    public function post(Request $request)
    {

        //verificar si existe la partida
        $existe = PartidaContable::where('id_partida_contable', '=', $request->id_partida)->first();
        if (!$existe) {
            //creamos la partida contable
            $partidaContable = new PartidaContable;
            $partidaContable->id_partida_contable = $request->id_partida;
            $numero_cuenta = PartidaContable::where('year_contable', '=', date('Y'))->max('num_partida');
            $partidaContable->num_partida = $numero_cuenta + 1;
            $partidaContable->year_contable = date('Y');
            $partidaContable->fecha_partida = today();
            $partidaContable->save();

        }



        //verificar si existe la partida contable detalle
        $existeDetalle = PartidaContableDetalleModel::where('id_partida', '=', $request->id_partida)
            ->where('id_cuenta', '=', $request->id_cuenta)->first();

        if ($existeDetalle) {
            return response()->json([
                'estado' => false,
                'message' => 'La cuenta ya existe en la partida'
            ], 200);
        } else {
            $detallePartida = new PartidaContableDetalleModel();
            $detallePartida->id_cuenta = $request->id_cuenta;
            $detallePartida->id_partida = $request->id_partida;
            $detallePartida->parcial = $request->parcial > 0 ? $request->parcial : 0.00;
            $detallePartida->cargos = $request->cargos > 0 ? $request->cargos : 0.00;
            $detallePartida->abonos = $request->abonos > 0 ? $request->abonos : 0.00;
            $detallePartida->estado = 0; //Pendiente de procesar la partida
            $detallePartida->save();

            return response()->json([
                'estado' => true,
                'message' => 'Partida guardada correctamente'
            ], 200);
            //
        }


    }
    public function getPartidaDetalles($idPartida)
    {
        $detalles = PartidaContableDetalleModel::join(
            'catalogo',
            'catalogo.id_cuenta',
            '=',
            'partida_contables_detalle.id_cuenta'
        )->where('id_partida', '=', $idPartida)
        ->orderBy('cargos', 'desc')
            ->orderBy('catalogo.numero', 'asc')

            ->get();
        return response()->json([
            'success' => true,
            'detalles' => $detalles
        ], 200);
    }

    public function delete($id_detalle)
    {
        PartidaContableDetalleModel::destroy($id_detalle);
        return response()->json([
            'success' => true,
            'message' => 'Detalle eliminado correctamente'
        ], 200);
        
    }
}