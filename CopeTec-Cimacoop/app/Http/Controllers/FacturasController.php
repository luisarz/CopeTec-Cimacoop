<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\CorrelativosModel;
use App\Models\FacturasDetalleModel;
use App\Models\FacturasModel;
use App\Models\ProductosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use \PDF;

class FacturasController extends Controller
{
    public function index(Request $request)
    {
        $filtro = $request->filtro;
        if (isset($filtro)) {
            $facturas = FacturasModel::join('clientes', 'facturas.id_cliente', '=', 'clientes.id_cliente')
                ->select('facturas.*', 'clientes.nombre', 'clientes.dui_cliente')
                ->where('clientes.nombre', 'like', '%' . $filtro . '%')
                ->orWhere('clientes.dui_cliente', '=', $filtro)
                ->orWhere('clientes.dui_cliente', '=', $filtro)
                ->orWhere('facturas.numero_factura', '=', $filtro)
                ->orderby('facturas.fecha_factura', 'desc')
                ->paginate(10);
        } else {
            $facturas = FacturasModel::join('clientes', 'facturas.id_cliente', '=', 'clientes.id_cliente')
                ->select('facturas.*', 'clientes.nombre', 'clientes.dui_cliente')
                ->orderby('facturas.fecha_factura', 'desc')
                ->paginate(10);
        }

        // dd($facturas);
        return view('facturas.index', compact('facturas', 'filtro'));
    }
    public function add()
    {
        $id_factura = Str::uuid()->toString();
        Session::put("estadoMenuminimizado", "1");

        $productos = ProductosModel::where('tipo_facturacion', '=', '2')->get();
        $clientes = Clientes::where('nombre', '!=', 'Bobeda General')->get();
        return view('facturas.add', compact('productos', 'clientes', 'id_factura'));
    }

    public function addProduct(Request $request)
    {

        $id_factura = $request->id_factura;
        $factura = facturasModel::where('id_factura', '=', $id_factura)->first();

        $neto = $request->cantidad * $request->precio;
        $iva = ($request->tipo_documento == "CCF") ? $neto * 0.13 : 0;
        $retencion = ($request->retencion == 1) ? $neto * 0.01 : 0;

        if ($factura) {
            //registrar los detalles de la factura
            $lineaFacturaDetalle = new FacturasDetalleModel;
            $lineaFacturaDetalle->id_factura = $id_factura;
            $lineaFacturaDetalle->id_producto = $request->id_producto;
            $lineaFacturaDetalle->cantidad = $request->cantidad;
            $lineaFacturaDetalle->precio = $request->precio;
            $lineaFacturaDetalle->subtotal = $neto;
            $lineaFacturaDetalle->iva = $iva;
            $lineaFacturaDetalle->retencion = $retencion;
            $lineaFacturaDetalle->total = $neto + $iva + $retencion;
            $lineaFacturaDetalle->save();
            //actualizar saldos de la factura
            $compraUpdate = FacturasModel::where('id_factura', '=', $id_factura)->first();
            if ($compraUpdate) {
                $compraUpdate->neto = $compraUpdate->neto + $neto;
                $compraUpdate->iva = $compraUpdate->iva + $iva;
                $compraUpdate->retencion = $compraUpdate->retencion + $retencion;
                $compraUpdate->total = $compraUpdate->total + $neto + $iva + $retencion;
                $compraUpdate->save();
            }



            return response()->json([
                'status' => 'ok',
                'message' => 'Producto agregado correctamente',
                'data' => $lineaFacturaDetalle
            ]);

        } else {
            //registrar la factura
            $factura = new FacturasModel;
            $factura->id_factura = $id_factura;
            $factura->tipo_documento = $request->tipo_documento;
            $factura->numero_factura = $request->numero_factura;
            $factura->id_cliente = $request->id_cliente;
            $factura->neto = $neto;
            $factura->iva = $iva;
            $factura->retencion = $retencion;
            $factura->total = $neto + $iva + $retencion;
            $factura->fecha_factura = $request->fecha_factura;
            $factura->fecha_registro = now();
            $factura->usuario = Session::get('id');
            $factura->estado = '1'; //Procesando
            $factura->save();


            $lineaFacturaDetalle = new FacturasDetalleModel;
            $lineaFacturaDetalle->id_factura = $id_factura;
            $lineaFacturaDetalle->id_producto = $request->id_producto;
            $lineaFacturaDetalle->cantidad = $request->cantidad;
            $lineaFacturaDetalle->precio = $request->precio;
            $lineaFacturaDetalle->subtotal = $neto;
            $lineaFacturaDetalle->iva = $iva;
            $lineaFacturaDetalle->retencion = $retencion;
            $lineaFacturaDetalle->total = $neto + $iva + $retencion;
            $lineaFacturaDetalle->save();




            return response()->json([
                'status' => 'ok',
                'message' => 'factura realizada y Producto agregado correctamente',
                'data' => $lineaFacturaDetalle
            ]);
        }





    }
    public function deleteProduct($id)
    {
        $compraDetalle = FacturasDetalleModel::where('id_detalle_factura', '=', $id)->first();
        $id_factura = $compraDetalle->id_factura;
        $factura = facturasModel::where('id_factura', '=', $id_factura)->first();
        $factura->neto = $factura->neto - $compraDetalle->subtotal;
        $factura->iva = $factura->iva - $compraDetalle->iva;
        $factura->retencion = $factura->retencion - $compraDetalle->retencion;
        $factura->total = $factura->total - $compraDetalle->total;
        $factura->save();
        $compraDetalle->delete();
        return response()->json([
            'status' => 'ok',
            'message' => 'Producto eliminado correctamente',
            'data' => $compraDetalle
        ]);
    }

    public function getDetalles($id_factura)
    {

        $detalles = FacturasDetalleModel::join('productos', 'facturas_detalle.id_producto', '=', 'productos.id_producto')
            ->where('facturas_detalle.id_factura', '=', $id_factura)->get();

        $subtotal = number_format($detalles->sum('subtotal'), 2);
        $iva = number_format($detalles->sum('iva'), 2);
        $retencion = number_format($detalles->sum('retencion'), 2);
        $total = number_format($detalles->sum('total'), 2);



        return response()->json([
            'status' => 'ok',
            'message' => 'Detalles de la factura',
            'detalles' => $detalles,
            'subtotal' => $subtotal,
            'iva' => $iva,
            'retencion' => $retencion,
            'total' => $total,
        ]);
    }

    public function edit($id)
    {
        // Session::put("estadoMenuminimizado", "1");
        $factura = facturasModel::where('id_factura', '=', $id)->first();
        $productos = ProductosModel::where('tipo_facturacion', '=', '2')->get();
        $clientes = Clientes::where('nombre', '!=', 'Bobeda General')->get();

        return view('facturas.edit', compact('factura', 'productos', 'clientes'));
    }

    public function finalizar(Request $request)
    {


        $id_factura = $request->id_factura;
        $numero_factura = $request->numero_factura;
        $id_cliente = $request->id_cliente;
        $fecha_factura = $request->fecha_factura;
        $retencion = $request->retencion;


        $factura = facturasModel::where('id_factura', '=', $id_factura)->first();
        $detalles = FacturasDetalleModel::join('productos', 'facturas_detalle.id_producto', '=', 'productos.id_producto')
            ->where('facturas_detalle.id_factura', '=', $id_factura)->get();

        if ($factura->estado != 2) {
            $correlativo = CorrelativosModel::where("tipo_documento", $request->tipo_documento)->first();
            $ultimo_emitido = $correlativo->ultimo_emitido;
            $ultimo_emitido = $ultimo_emitido + 1;
            $correlativo->ultimo_emitido = $ultimo_emitido;
            $correlativo->save();
        }

        $subtotal = number_format($detalles->sum('subtotal'), 2, '.', '');
        $iva = number_format($detalles->sum('iva'), 2, '.', '');
        $retencion = number_format($detalles->sum('retencion'), 2, '.', '');
        $total = number_format($detalles->sum('total'), 2, '.', '');

        $factura->tipo_documento = $request->tipo_documento;
        $factura->numero_factura = $numero_factura;
        $factura->id_cliente = $id_cliente;
        $factura->neto = $subtotal;
        $factura->iva = $iva;
        $factura->retencion = $retencion;
        $factura->total = $total;
        $factura->fecha_factura = $fecha_factura;
        $factura->fecha_registro = now();
        $factura->usuario = Session::get('id');
        $factura->estado = '2'; //Finalizado
        $factura->save();






        //actualizar los correlativos





        return response()->json([
            'status' => 'ok',
            'message' => 'Detalles de la factura',
            'detalles' => $detalles,
            'subtotal' => $subtotal,
            'iva' => $iva,
            'retencion' => $retencion,
            'total' => $total,
        ]);

    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $factura = facturasModel::find($id);
        $factura->delete();
        return redirect('facturas/list');
    }

    public function reporte($filtro)
    {
        if ($filtro != 'all') {
            $facturas = facturasModel::join('clientes', 'facturas.id_cliente', '=', 'clientes.id_cliente')
            ->select('facturas.*', 'clientes.nombre', 'clientes.dui_cliente')
                ->where('razon_social', 'like', '%' . $filtro . '%')
                ->orWhere('clientes.dui', '=', $filtro)->get();
        } else {
            
            $facturas = facturasModel::join('clientes', 'facturas.id_cliente', '=', 'clientes.id_cliente')
            ->select('facturas.*', 'clientes.nombre', 'clientes.dui')->get();
        }



        $pdf = PDF::loadView('facturas.reporte', [
            'estilos' => file_get_contents(public_path('assets/css/css.css')),
            'stilosBundle' => file_get_contents(public_path('assets/css/style.bundle.css')),
            'facturas' => $facturas
        ]);
        return $pdf->setOrientation('portrait')->inline();

    }


    public function retencion(Request $request)
    {
        $id_factura = $request->id_factura;
        $retencion = $request->retencion;

        $detallesCompra = FacturasDetalleModel::where('id_factura', '=', $id_factura)->get();
        foreach ($detallesCompra as $detalle) {
            if ($retencion == 1) { //agregar retencion
                $id_detalle_factura = $detalle->id_detalle_factura;
                $ItemCompra = FacturasDetalleModel::find($id_detalle_factura);
                if ($ItemCompra->retencion == 0) {
                    $ItemCompra->retencion = $ItemCompra->subtotal * 0.01;
                    $ItemCompra->total = $ItemCompra->total + $ItemCompra->retencion;
                    $ItemCompra->save();
                }

            } else { //QuitarPercepcion
                $id_detalle_factura = $detalle->id_detalle_factura;
                $ItemCompra = FacturasDetalleModel::find($id_detalle_factura);
                if ($ItemCompra->retencion > 0) {
                    $ItemCompra->total = $ItemCompra->total - $ItemCompra->retencion;
                    $ItemCompra->retencion = 0;
                    $ItemCompra->save();
                }
            }

        }
        $mensaje = "retencion Agregada correctamente";
        if ($retencion != 1) {
            $mensaje = "retencion Quitada correctamente";
        }

        $factura = facturasModel::where('id_factura', '=', $id_factura)->first();
        $detalles = FacturasDetalleModel::join('productos', 'facturas_detalle.id_producto', '=', 'productos.id_producto')
            ->where('facturas_detalle.id_factura', '=', $id_factura)->get();

        $subtotal = number_format($detalles->sum('subtotal'), 2, '.', '');
        $iva = number_format($detalles->sum('iva'), 2, '.', '');
        $retencion = number_format($detalles->sum('retencion'), 2, '.', '');
        $total = number_format($detalles->sum('total'), 2, '.', '');

        $factura->neto = $subtotal;
        $factura->iva = $iva;
        $factura->retencion = $retencion;
        $factura->total = $total;
        $factura->fecha_registro = now();
        $factura->usuario = Session::get('id');
        $factura->estado = '2'; //Finalizado
        $factura->save();


        return response()->json([
            'status' => 'ok',
            'message' => $mensaje,
            'data' => $detallesCompra
        ]);



    }

}