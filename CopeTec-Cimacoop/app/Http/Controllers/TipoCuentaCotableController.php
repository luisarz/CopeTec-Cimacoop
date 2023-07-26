<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\TipoCuentaCotableModel;
use Illuminate\Http\Request;

class TipoCuentaCotableController extends Controller
{
    public function index(Request $request)
    {
        $tipoCuentas = TipoCuentaCotableModel::when(isset($request->filtro), function ($query) use ($request) {
            $query->where('descripcion', 'LIKE', '%' . $request->filtro . '%');

            })
            ->orderBy('id_tipo_catalogo', 'asc')
            ->paginate(10);

        return view('contabilidad.tipocuentacontable.index', compact('tipoCuentas'));

    }

    public function add()
    {
        $tipoCatalogo = TipoCuentaCotableModel::all();
        return view('contabilidad.tipocuentacontable.add', compact('tipoCatalogo'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        TipoCuentaCotableModel::destroy($id);
        return redirect("/contabilidad/tipocuentacontable");

    }
    public function post(Request $request)
    {
        $tipoCuentaContable = new TipoCuentaCotableModel();
        $tipoCuentaContable->descripcion = $request->descripcion;
        $tipoCuentaContable->save();
        return redirect("/contabilidad/tipocuentacontable");
    }
    public function edit($id)
    {
        $tipoCuenta = TipoCuentaCotableModel::find($id);
        return view('/contabilidad.tipocuentacontable.edit', compact('tipoCuenta' ));
    }
    public function put(Request $request)
    {
        $tipoCuentaContable = TipoCuentaCotableModel::find($request->id);
        $tipoCuentaContable->descripcion = $request->descripcion;
        $tipoCuentaContable->save();
        return redirect("/contabilidad/tipocuentacontable");
    }
}
