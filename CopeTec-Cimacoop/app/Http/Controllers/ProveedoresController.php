<?php

namespace App\Http\Controllers;

use App\Models\ProveedoresModel;
use Illuminate\Http\Request;
use PDF;

class ProveedoresController extends Controller
{
    public function index(Request $request)
    {
        $filtro = $request->get('filtro');
        if ($filtro == null) {
            $proveedores = ProveedoresModel::paginate(10);
        } else {
            $proveedores = ProveedoresModel::where('razon_social', 'like', '%' . $filtro . '%')->paginate(10);
        }
        return view('proveedores.index', compact('proveedores', 'filtro'));
    }
    public function add()
    {
        return view('proveedores.add');
    }

    public function post(Request $request)
    {

        $proveedor = new ProveedoresModel();
        $proveedor->dui = $request->dui;
        $proveedor->nit = $request->nit;
        $proveedor->nrc = $request->nrc;
        $proveedor->razon_social = $request->razon_social;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->decimales = $request->decimales;
        $proveedor->save();
        return redirect('proveedores/list');
    }

    public function put(Request $request)
    {

        $proveedor= ProveedoresModel::findOrFail($request->id_proveedor);
        $proveedor->dui = $request->dui;
        $proveedor->nit = $request->nit;
        $proveedor->nrc = $request->nrc;
        $proveedor->razon_social = $request->razon_social;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->decimales = $request->decimales;
        $proveedor->save();
        return redirect('proveedores/list');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $proveedor = ProveedoresModel::find($id);
        return view('proveedores.edit', compact('proveedor'));
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $proveedor = ProveedoresModel::find($id);
        $proveedor->delete();
        return redirect('proveedores/list');
    }

    public function reporte($filtro)
    {

        if ($filtro != 'all') {
            $proveedores = ProveedoresModel::where('razon_social', 'like', '%' . $filtro . '%')->get();
        } else {
            $proveedores = ProveedoresModel::all();
        }


        $pdf = PDF::loadView('proveedores.proveedores_rep', [
            'estilos' => file_get_contents(public_path('assets/css/css.css')),
            'stilosBundle' => file_get_contents(public_path('assets/css/style.bundle.css')),
            'proveedores' => $proveedores
        ]);
        return $pdf->setOrientation('portrait')->inline();

    }
}
