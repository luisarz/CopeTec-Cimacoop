<?php

namespace App\Http\Controllers;

use App\Models\CompraDetalles;
use App\Models\ComprasModel;
use App\Models\ProductosModel;
use App\Models\ProveedoresModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use \PDF;

class ComprasController extends Controller
{
    public function index(Request $request)
    {
        $filtro = $request->filtro;
        if (isset($filtro)) {
            $compras = ComprasModel::join('proveedores', 'compras.id_proveedor', '=', 'proveedores.id_proveedor')
                ->where('razon_social', 'like', '%' . $filtro . '%')
                ->orWhere('proveedores.dui', '=', $filtro)->paginate(10);
        } else {
            $compras = ComprasModel::join('proveedores', 'compras.id_proveedor', '=', 'proveedores.id_proveedor')->paginate(10);
        }

        // dd($compras);
        return view('compras.index', compact('compras', 'filtro'));
    }
    public function add()
    {
        $id_compra = Str::uuid()->toString();
        // Session::put("estadoMenuminimizado", "1");

        $productos = ProductosModel::all();
        $proveedores = ProveedoresModel::all();
        return view('compras.add', compact('productos', 'proveedores', 'id_compra'));
    }

    public function addProduct(Request $request)
    {

        $id_compra = $request->id_compra;
        $compra = ComprasModel::where('id_compra', '=', $id_compra)->first();

        $neto = $request->cantidad * $request->precio;
        $iva = $neto * 0.13;
        $percepcion = ($request->percepcion == 1) ? $neto * 0.01 : 0;

        if ($compra) {
            //registrar los detalles de la compra
            $lineaFacturaDetalle = new CompraDetalles;
            $lineaFacturaDetalle->id_compra = $id_compra;
            $lineaFacturaDetalle->id_producto = $request->id_producto;
            $lineaFacturaDetalle->cantidad = $request->cantidad;
            $lineaFacturaDetalle->precio = $request->precio;
            $lineaFacturaDetalle->subtotal = $neto;
            $lineaFacturaDetalle->iva = $iva;
            $lineaFacturaDetalle->percepcion = $percepcion;
            $lineaFacturaDetalle->total = $neto + $iva + $percepcion;
            $lineaFacturaDetalle->save();
            //actualizar saldos de la compra
            $compraUpdate = ComprasModel::where('id_compra', '=', $id_compra)->first();
            if ($compraUpdate) {
                $compraUpdate->neto = $compraUpdate->neto + $neto;
                $compraUpdate->iva = $compraUpdate->iva + $iva;
                $compraUpdate->percepcion = $compraUpdate->percepcion + $percepcion;
                $compraUpdate->total = $compraUpdate->total + $neto + $iva + $percepcion;
                $compraUpdate->save();
            }



            return response()->json([
                'status' => 'ok',
                'message' => 'Producto agregado correctamente',
                'data' => $lineaFacturaDetalle
            ]);

        } else {
            //registrar la compra
            $compra = new ComprasModel;
            $compra->id_compra = $id_compra;
            $compra->numero_fcc = $request->numero_fcc;
            $compra->id_proveedor = $request->id_proveedor;
            $compra->neto = $neto;
            $compra->iva = $iva;
            $compra->percepcion = $percepcion;
            $compra->total = $neto + $iva + $percepcion;
            $compra->fecha_compra = $request->fecha_compra;
            $compra->fecha_registro = now();
            $compra->usuario = Session::get('id');
            $compra->estado = '1'; //Procesando
            $compra->save();


            $lineaFacturaDetalle = new CompraDetalles;
            $lineaFacturaDetalle->id_compra = $id_compra;
            $lineaFacturaDetalle->id_producto = $request->id_producto;
            $lineaFacturaDetalle->cantidad = $request->cantidad;
            $lineaFacturaDetalle->precio = $request->precio;
            $lineaFacturaDetalle->subtotal = $neto;
            $lineaFacturaDetalle->iva = $iva;
            $lineaFacturaDetalle->percepcion = $percepcion;
            $lineaFacturaDetalle->total = $neto + $iva + $percepcion;
            $lineaFacturaDetalle->save();




            return response()->json([
                'status' => 'ok',
                'message' => 'Compra realizada y Producto agregado correctamente',
                'data' => $lineaFacturaDetalle
            ]);
        }





    }
    public function deleteProduct($id)
    {
        $compraDetalle = CompraDetalles::where('id_detalle_compra', '=', $id)->first();
        $id_compra = $compraDetalle->id_compra;
        $compra = ComprasModel::where('id_compra', '=', $id_compra)->first();
        $compra->neto = $compra->neto - $compraDetalle->subtotal;
        $compra->iva = $compra->iva - $compraDetalle->iva;
        $compra->percepcion = $compra->percepcion - $compraDetalle->percepcion;
        $compra->total = $compra->total - $compraDetalle->total;
        $compra->save();
        $compraDetalle->delete();
        return response()->json([
            'status' => 'ok',
            'message' => 'Producto eliminado correctamente',
            'data' => $compraDetalle
        ]);
    }

    public function getDetalles($id_compra)
    {

        $detalles = CompraDetalles::join('productos', 'compras_detalle.id_producto', '=', 'productos.id_producto')
            ->where('compras_detalle.id_compra', '=', $id_compra)->get();

        $subtotal = number_format($detalles->sum('subtotal'), 2);
        $iva = number_format($detalles->sum('iva'), 2);
        $percepcion = number_format($detalles->sum('percepcion'), 2);
        $total = number_format($detalles->sum('total'), 2);



        return response()->json([
            'status' => 'ok',
            'message' => 'Detalles de la compra',
            'detalles' => $detalles,
            'subtotal' => $subtotal,
            'iva' => $iva,
            'percepcion' => $percepcion,
            'total' => $total,
        ]);
    }

    public function edit($id)
    {
        // Session::put("estadoMenuminimizado", "1");
        $compra = ComprasModel::where('id_compra', '=', $id)->first();
        $productos = ProductosModel::all();
        $proveedores = ProveedoresModel::all();
        return view('compras.edit', compact('compra', 'productos', 'proveedores'));
    }

    public function finalizar(Request $request)
    {
        $id_compra = $request->id_compra;
        $numero_fcc = $request->numero_fcc;
        $id_proveedor = $request->id_proveedor;
        $fecha_compra = $request->fecha_compra;
        $percepcion = $request->percepcion;


        $compra = ComprasModel::where('id_compra', '=', $id_compra)->first();
        $detalles = CompraDetalles::join('productos', 'compras_detalle.id_producto', '=', 'productos.id_producto')
            ->where('compras_detalle.id_compra', '=', $id_compra)->get();

        $subtotal = number_format($detalles->sum('subtotal'), 2, '.', '');
        $iva = number_format($detalles->sum('iva'), 2, '.', '');
        $percepcion = number_format($detalles->sum('percepcion'), 2, '.', '');
        $total = number_format($detalles->sum('total'), 2, '.', '');

        $compra->numero_fcc = $numero_fcc;
        $compra->id_proveedor = $id_proveedor;
        $compra->neto = $subtotal;
        $compra->iva = $iva;
        $compra->percepcion = $percepcion;
        $compra->total = $total;
        $compra->fecha_compra = $fecha_compra;
        $compra->fecha_registro = now();
        $compra->usuario = Session::get('id');
        $compra->estado = '2'; //Finalizado
        $compra->save();




        return response()->json([
            'status' => 'ok',
            'message' => 'Detalles de la compra',
            'detalles' => $detalles,
            'subtotal' => $subtotal,
            'iva' => $iva,
            'percepcion' => $percepcion,
            'total' => $total,
        ]);

    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $compra = ComprasModel::find($id);
        $compra->delete();
        return redirect('compras/list');
    }

    public function reporte($filtro)
    {
        ;
        if ($filtro != 'all') {
            $compras = ComprasModel::join('proveedores', 'compras.id_proveedor', '=', 'proveedores.id_proveedor')
                ->where('razon_social', 'like', '%' . $filtro . '%')
                ->orWhere('proveedores.dui', '=', $filtro)->get();
        } else {
            $compras = ComprasModel::join('proveedores', 'compras.id_proveedor', '=', 'proveedores.id_proveedor')->get();
        }



        $pdf = PDF::loadView('compras.reporte', [
            'estilos' => file_get_contents(public_path('assets/css/css.css')),
            'stilosBundle' => file_get_contents(public_path('assets/css/style.bundle.css')),
            'compras' => $compras
        ]);
        return $pdf->setOrientation('portrait')->inline();

    }


    public function percepcion(Request $request)
    {
        $id_compra = $request->id_compra;
        $percepcion = $request->percepcion;

        $detallesCompra = CompraDetalles::where('id_compra', '=', $id_compra)->get();
        foreach ($detallesCompra as $detalle) {
            if ($percepcion == 1) { //agregar Percepcion
                $id_detalle_compra = $detalle->id_detalle_compra;
                $ItemCompra = CompraDetalles::find($id_detalle_compra);
                if($ItemCompra->percepcion == 0){
                    $ItemCompra->percepcion = $ItemCompra->subtotal * 0.01;
                    $ItemCompra->total = $ItemCompra->total + $ItemCompra->percepcion;
                    $ItemCompra->save();
                }

            } else { //QuitarPercepcion
                $id_detalle_compra = $detalle->id_detalle_compra;
                $ItemCompra = CompraDetalles::find($id_detalle_compra);
                if($ItemCompra->percepcion >0){
                    $ItemCompra->total = $ItemCompra->total - $ItemCompra->percepcion;
                    $ItemCompra->percepcion = 0;
                    $ItemCompra->save();
                }
            }

        }
        $mensaje = "Percepcion Agregada correctamente";
        if ($percepcion != 1) {
            $mensaje = "Percepcion Quitada correctamente";
        }

        $compra = ComprasModel::where('id_compra', '=', $id_compra)->first();
        $detalles = CompraDetalles::join('productos', 'compras_detalle.id_producto', '=', 'productos.id_producto')
            ->where('compras_detalle.id_compra', '=', $id_compra)->get();

        $subtotal = number_format($detalles->sum('subtotal'), 2, '.', '');
        $iva = number_format($detalles->sum('iva'), 2, '.', '');
        $percepcion = number_format($detalles->sum('percepcion'), 2, '.', '');
        $total = number_format($detalles->sum('total'), 2, '.', '');

        $compra->neto = $subtotal;
        $compra->iva = $iva;
        $compra->percepcion = $percepcion;
        $compra->total = $total;
        $compra->fecha_registro = now();
        $compra->usuario = Session::get('id');
        $compra->estado = '2'; //Finalizado
        $compra->save();


        return response()->json([
            'status' => 'ok',
            'message' => $mensaje,
            'data' => $detallesCompra
        ]);



    }

}