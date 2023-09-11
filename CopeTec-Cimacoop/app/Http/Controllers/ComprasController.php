<?php

namespace App\Http\Controllers;

use App\Models\CompraDetalles;
use App\Models\ComprasModel;
use App\Models\ProductosModel;
use App\Models\ProveedoresModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

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
        Session::put("estadoMenuminimizado", "1");

        $productos = ProductosModel::all();
        $proveedores = ProveedoresModel::all();
        return view('compras.add', compact('productos', 'proveedores', 'id_compra'));
    }

    public function addProduct(Request $request)
    {

        $id_compra = $request->id_compra;
        $compra = ComprasModel::where('id_compra', '=', $id_compra)->first();
        if ($compra) {
            //registrar los detalles de la compra
            $lineaFacturaDetalle = new CompraDetalles;
            $lineaFacturaDetalle->id_compra = $id_compra;
            $lineaFacturaDetalle->id_producto = $request->id_producto;
            $lineaFacturaDetalle->cantidad = $request->cantidad;
            $lineaFacturaDetalle->precio = $request->precio;
            $lineaFacturaDetalle->total = $request->cantidad * $request->precio;
            $lineaFacturaDetalle->save();
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
            $compra->neto = 0;
            $compra->iva = 0;
            $compra->percepcion = 0;
            $compra->total = 0;
            $compra->fecha_compra = $request->fecha_compra;
            $compra->fecha_registro = now();
            $compra->usuario = Session::get('id');
            $compra->estado = '1';
            $compra->save();

            $lineaFacturaDetalle = new CompraDetalles;
            $lineaFacturaDetalle->id_compra = $id_compra;
            $lineaFacturaDetalle->id_producto = $request->id_producto;
            $lineaFacturaDetalle->cantidad = $request->cantidad;
            $lineaFacturaDetalle->precio = $request->precio;
            $lineaFacturaDetalle->total = $request->cantidad * $request->precio;
            $lineaFacturaDetalle->save();

            return response()->json([
                'status' => 'ok',
                'message' => 'Compra realizada y Producto agregado correctamente',
                'data' => $lineaFacturaDetalle
            ]);
        }





    }

    public function getDetalles($id_compra)
    {

        $detalles = CompraDetalles::join('productos', 'compras_detalle.id_producto', '=', 'productos.id_producto')
            ->where('compras_detalle.id_compra', '=', $id_compra)->get();

        $subtotal = $detalles->sum('total');
        $iva = number_format($subtotal * 0.13, 2, '.', '');
        $percepcion = number_format($subtotal * 0.01, 2, '.', '');
        $totalFormated = $subtotal + $iva + $percepcion;
        $totalFormated = number_format($totalFormated, 2);



        return response()->json([
            'status' => 'ok',
            'message' => 'Detalles de la compra',
            'detalles' => $detalles,
            'subtotal' => $subtotal,
            'iva' => $iva,
            'percepcion' => $percepcion,
            'total' => $totalFormated
        ]);
    }

    public function post(Request $request)
    {
        $producto = new ComprasModel();
        $producto->nombre = $request->nombre;
        $producto->presentacion = $request->presentacion;
        $producto->marca = $request->marca;
        $producto->cod_barra = $request->cod_barra;
        $producto->costo = $request->costo;
        $producto->save();
        return redirect('compras/list');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $producto = ComprasModel::find($id);
        return view('compras.edit', compact('producto'));
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $producto = ComprasModel::find($id);
        $producto->delete();
        return redirect('compras/list');
    }

    public function reporte($filtro)
    {

        if ($filtro != 'all') {
            $compras = ComprasModel::where('nombre', 'like', '%' . $filtro . '%')
                ->orWhere('cod_barra', '=', $filtro)->paginate(10);
        } else {
            $compras = ComprasModel::all();
        }


        $pdf = PDF::loadView('reportes.compras.compras_rep', [
            'estilos' => file_get_contents(public_path('assets/css/css.css')),
            'stilosBundle' => file_get_contents(public_path('assets/css/style.bundle.css')),
            'compras' => $compras
        ]);
        return $pdf->setOrientation('portrait')->inline();

    }


}