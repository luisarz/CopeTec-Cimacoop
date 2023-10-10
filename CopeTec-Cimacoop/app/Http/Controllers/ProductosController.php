<?php

namespace App\Http\Controllers;

use App\Models\ProductosModel;
use Illuminate\Http\Request;
use PDF;
class ProductosController extends Controller
{
    //
    public function index(Request $request)
    {
        $filtro = $request->filtro;
        if(isset($filtro)){
            $productos = ProductosModel::where('nombre', 'like', '%'.$filtro.'%')
            ->orWhere('cod_barra','=',$filtro)->paginate(10);    
        }else{
            $productos = ProductosModel::paginate(10);
        }
        return view('productos.index', compact('productos','filtro'));
    }
    public function add()
    {
        return view('productos.add');
    }
   
    public function post(Request $request){
        $producto = new ProductosModel();
        $producto->nombre = $request->nombre;
        $producto->presentacion = $request->presentacion;
        $producto->marca= $request->marca;
        $producto->cod_barra = $request->cod_barra;
        $producto->costo = $request->costo;
        $producto->tipo_facturacion= $request->tipo_facturacion;
        $producto->save();
        return redirect('productos/list');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $producto = ProductosModel::find($id);
        return view('productos.edit', compact('producto'));
    }

    public function put(Request $request)
    {
        $producto =  ProductosModel::find($request->id_producto);
        $producto->nombre = $request->nombre;
        $producto->presentacion = $request->presentacion;
        $producto->marca = $request->marca;
        $producto->cod_barra = $request->cod_barra;
        $producto->costo = $request->costo;
        $producto->tipo_facturacion = $request->tipo_facturacion;
        $producto->save();
        return redirect('productos/list');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $producto = ProductosModel::find($id);
        $producto->delete();
        return redirect('productos/list');
    }

    public function reporte($filtro)
    {
      
        if ($filtro!='all') {
            $productos = ProductosModel::where('nombre', 'like', '%' . $filtro . '%')
                ->orWhere('cod_barra', '=', $filtro)->paginate(10);
        } else {
            $productos = ProductosModel::all();
        }


        $pdf = PDF::loadView('reportes.productos.productos_rep', [
            'estilos' =>  file_get_contents(public_path('assets/css/css.css')),
            'stilosBundle' =>  file_get_contents(public_path('assets/css/style.bundle.css')),
            'productos' => $productos
        ]);
        return $pdf->setOrientation('portrait')->inline();

    }

}