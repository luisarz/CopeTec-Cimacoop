<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\LiquidacionModel;
use Illuminate\Http\Request;

class LiquidacionController extends Controller
{
    public function addDescuentoDesembolso(Request $request)
    {

        // dd($request->all());

        $liquidacion = new LiquidacionModel();
        $liquidacion->id_credito = $request->id_credito;
        $liquidacion->id_cuenta = $request->id_cuenta;
        $liquidacion->comentario = $request->comentario;
        $liquidacion->monto_debe = $request->monto_debe > 0 ? $request->monto_debe : 0.00;
        $liquidacion->monto_haber = $request->filled('monto_haber') ? $request->monto_haber : 0.00;


        // Assume you have a 'Catalogo' model and a field named 'tiene_iva' indicating whether it has IVA or not.
        $actualizarLiquido = Catalogo::find($request->id_cuenta);


        if ($actualizarLiquido->iva != null) {

            // Calculate the IVA if the 'catalogo' has IVA.
            $iva = $request->monto_haber * 0.13; // Assuming 16% IVA, adjust the percentage accordingly.

            if ($iva > 0) {
                // If IVA is greater than 0, register the 'liquidacion' entry.
                $liquidacion->estado = 1;
                $liquidacion->save();

                // Register the IVA entry (ID=18 -2203010101 Debito Fiscal- Facturas)
                //verificamos si existe el iva en la tabla liquidacion

                $existenciaIva = LiquidacionModel::where('id_credito', $request->id_credito)
                    ->where('id_cuenta', 428) //ID de la cuenta de iva 2203010101
                    ->first();
                if ($existenciaIva) {
                    $existenciaIva->monto_haber = $existenciaIva->monto_haber + $iva;
                    $existenciaIva->save();
                } else {
                    $ivaLiquidacion = new LiquidacionModel();
                    $ivaLiquidacion->id_credito = $request->id_credito;
                    $ivaLiquidacion->id_cuenta = 428; // IVA account ID
                    $ivaLiquidacion->monto_debe = 0.00;
                    $ivaLiquidacion->monto_haber = $iva;
                    $ivaLiquidacion->estado = 1;
                    $ivaLiquidacion->save();
                }


                $actualizarLiquido = LiquidacionModel::where('id_credito', $request->id_credito)
                    ->orderByDesc('monto_haber')
                    ->first();


                if ($actualizarLiquido) {
                    $actualizarLiquido->monto_haber = $actualizarLiquido->monto_haber - $iva;
                    $actualizarLiquido->save();
                }

            } else {
                $liquidacion->estado = 1;
                $liquidacion->save();
            }
        } else {
            // If the 'catalogo' doesn't have IVA, just save the original 'liquidacion' entry.
            $liquidacion->estado = 1;
            $liquidacion->save();
        }



        //buscar si existe estas cuentas  21010101 11010301
        //si existe descontarle el total de debe que acabos de registrar
        $actualizarLiquido = LiquidacionModel::where('id_credito', $request->id_credito)
            ->orderByDesc('monto_haber')
            ->first();




        if ($actualizarLiquido) {
            if ($actualizarLiquido->monto_haber != $request->monto_haber) {
                $actualizarLiquido->monto_haber = $actualizarLiquido->monto_haber - $request->monto_haber;
                $actualizarLiquido->save();
            }

        }






        return response()->json([
            "status" => true,
            "message" => "Detalle de liquidacion  agregado correctamente"
        ]);
    }

    public function getDescuentos($id)
    {

        $liquidaciones = LiquidacionModel::join('catalogo', 'catalogo.id_cuenta', 'liquidacion.id_cuenta')->where('id_credito', $id)->get();
        $sumMontoDebe = $liquidaciones->pluck('monto_debe')->sum();
        $sumMontoHaber = $liquidaciones->pluck('monto_haber')->sum();

        $liquido =  LiquidacionModel::where('id_credito', $id)
            ->orderByDesc('monto_haber')
            ->first();
        if ($liquido) {
            $liquido = $liquido->monto_haber;
        } else {
            $liquido = 0;
        }
        // $liquido = $liquido->monto_haber;

        $aportacion = LiquidacionModel::where('id_credito', $id)
            ->where('id_cuenta', 14)
            ->first();

        if ($aportacion) {
            $aportacion = $aportacion->monto_haber;
        } else {
            $aportacion = 0;
        }
        // $aportacion = $aportacion->monto_haber;


        return response()->json([
            "status" => true,
            "message" => "Detalle recuperados   correctamente",
            "liquidaciones" => $liquidaciones,
            "sumMontoDebe" => number_format($sumMontoDebe, 2),
            "sumMontoHaber" => number_format($sumMontoHaber, 2),
            "liquido" => $liquido,
            "aportacion" => $aportacion,
        ]);
    }

    public function deleteDescuento($id)
    {
        $liquidacion = LiquidacionModel::find($id);
        $id_credito = $liquidacion->id_credito;
        $montoHaber = $liquidacion->monto_haber;
        $id_cuenta = $liquidacion->id_cuenta;
        $liquidacion->delete();

        $actualizarLiquido = LiquidacionModel::where('id_credito', $id_credito)
            ->orderByDesc('monto_haber')
            ->first();
        if ($actualizarLiquido) {
            $actualizarLiquido->monto_haber = $actualizarLiquido->monto_haber + $montoHaber;
            $actualizarLiquido->save();

        }

        //buscando si tiene  IVA la cuenta para desconarle el iva
        $buscarIvaEnCuenta = Catalogo::find($id_cuenta);
        if ($buscarIvaEnCuenta->iva != null) {
            $iva = $montoHaber * 0.13;
            if ($iva > 0) {
                $existenciaIva = LiquidacionModel::where('id_credito', $id_credito)
                    ->where('id_cuenta', 18)
                    ->first();
                if ($existenciaIva) {
                    $existenciaIva->monto_haber = $existenciaIva->monto_haber - $iva;
                    $existenciaIva->save();
                }

                $aumentarLiquido = LiquidacionModel::where('id_credito', $id_credito)
                    ->orderByDesc('monto_haber')
                    ->first();

                if ($aumentarLiquido) {
                    $aumentarLiquido->monto_haber = $aumentarLiquido->monto_haber + $iva;
                    $aumentarLiquido->save();
                }

            }
        }



        return response()->json([
            "status" => true,
            "message" => "Detalle eliminado correctamente"
        ]);
    }



}