<?php

namespace App\Http\Controllers;

use App\Models\ComprasModel;
use App\Models\ProductosModel;
use App\Models\ProveedoresModel;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    public function index(Request $request)
    {
        $filtro = $request->filtro;
        if (isset($filtro)) {
            $compras = ComprasModel::join('proveedores','compras.id_proveedor','=','proveedores.id_proveedor')
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
        $productos=ProductosModel::all();
        $proveedores=ProveedoresModel::all();
        return view('compras.add',compact('productos','proveedores'));
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
