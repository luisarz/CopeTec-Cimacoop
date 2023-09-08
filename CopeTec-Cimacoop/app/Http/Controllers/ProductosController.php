<?php

namespace App\Http\Controllers;

use App\Models\ProductosModel;
use Illuminate\Http\Request;

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
        $producto->save();
        return redirect('productos/list');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $producto = ProductosModel::find($id);
        return view('productos.edit', compact('producto'));
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $producto = ProductosModel::find($id);
        $producto->delete();
        return redirect('productos/list');
    }

}