<?php

namespace App\Http\Controllers;

use App\Models\ProveedoresModel;
use Illuminate\Http\Request;

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
}
