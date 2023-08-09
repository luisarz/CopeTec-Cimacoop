<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\PartidaContable;
use App\Models\PartidaContableDetalleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            if ($request->cargos > 0) {
                $detallePartida->parcial = $request->cargos; 
            }
            if ($request->abonos > 0) {
                $detallePartida->parcial = $request->abonos;
            }
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

        $detalles = PartidaContableDetalleModel::join('catalogo', 'catalogo.id_cuenta', '=', 'partida_contables_detalle.id_cuenta')
            ->where('id_partida', '=', $idPartida)
            ->orderBy('cargos', 'desc')
            ->orderBy('catalogo.numero', 'asc')
            ->get();

        $sumCargos = $detalles->pluck('cargos')->sum();
        $sumAbonos = $detalles->pluck('abonos')->sum();






        $results = DB::table('catalogo AS c')
            ->select(
                'c.descripcion AS descripcion_cuenta_padre',
                'c.numero AS cuentaPadre',
                'b.numero AS cuentaHija',
                'b.descripcion AS descripcion_cuenta_hija',
                'a.parcial',
                'a.cargos',
                'a.abonos'
            )
            ->join('catalogo AS b', 'c.id_cuenta', '=', 'b.id_cuenta_padre')
            ->leftJoin('partida_contables_detalle AS a', 'b.id_cuenta', '=', 'a.id_cuenta')
            ->where('a.id_partida', '3c4fb732-8045-4267-9766-32fb2da0a126')
            ->orderBy('a.cargos', 'desc')
            ->get();

        $formattedResults = [];
        foreach ($results as $result) {
            if (!array_key_exists($result->descripcion_cuenta_padre, $formattedResults)) {
                $formattedResults[$result->descripcion_cuenta_padre] = [
                    'descripcion_cuenta_hija' => [],
                    'total_parcial' => 0,
                    'total_cargos' => 0,
                    'total_abonos' => 0,
                ];
            }


            $formattedResults[$result->descripcion_cuenta_padre]['descripcion_cuenta_hija'][] = [
                'cuenta' => $result->cuentaHija,
                'descripcion_cuenta_hija' => $result->descripcion_cuenta_hija,
                'parcial' => $result->parcial,
                'cargos' => $result->cargos,
                'abonos' => $result->abonos,
            ];
            $formattedResults[$result->descripcion_cuenta_padre]['cuenta_padre'] = $result->cuentaPadre;
            $formattedResults[$result->descripcion_cuenta_padre]['total_parcial'] += $result->parcial;
            $formattedResults[$result->descripcion_cuenta_padre]['total_cargos'] += $result->cargos;
            $formattedResults[$result->descripcion_cuenta_padre]['total_abonos'] += $result->abonos;

        }






        // return response()->json($results);



        return response()->json([
            'success' => true,
            'results' => $formattedResults,
            'detalles' => $detalles,
            'sumCargos' => number_format($sumCargos, 2),
            'sumAbonos' => number_format($sumAbonos, 2),
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