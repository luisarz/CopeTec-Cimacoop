<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\CatalogoTipo;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index(Request $request)
    {
        $cuentas = Catalogo::join('catalogo_tipo', 'catalogo_tipo.id_tipo_catalogo', '=', 'catalogo.tipo_catalogo')
            ->when(isset($request->filtro), function ($query) use ($request) {
                $query->where('catalogo.descripcion', 'LIKE', '%' . $request->filtro . '%')
                    ->orWhere('catalogo.numero', '=', $request->filtro);

            })
            ->select('catalogo_tipo.descripcion as catalogo', 'catalogo.*')
            ->paginate(10);

        return view('contabilidad.catalogo.index', compact('cuentas'));

    }

    public function add()
    {
        $tipoCatalogo = CatalogoTipo::all();
        return view('contabilidad.catalogo.add', compact('tipoCatalogo'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        Catalogo::destroy($id);
        return redirect("/contabilidad/catalogo");

    }
    public function post(Request $request)
    {
        $cuenta = new Catalogo();
        $cuenta->numero = $request->numero;
        $cuenta->descripcion = $request->descripcion;
        $cuenta->tipo_catalogo = $request->tipo_catalogo;
        $cuenta->estado = $request->estado;
        $cuenta->saldo = $request->saldo;
        $cuenta->iva = $request->iva;
        $cuenta->save();
        return redirect("/contabilidad/catalogo");
    }
    public function edit($id)
    {
        $cuenta = Catalogo::find($id);
        $tipoCatalogo = CatalogoTipo::all();

        return view('contabilidad.catalogo.edit', compact('cuenta', 'tipoCatalogo'));
    }
    public function put(Request $request)
    {
        $cuenta = Catalogo::find($request->id);
        $cuenta->numero = $request->numero;
        $cuenta->descripcion = $request->descripcion;
        $cuenta->estado = $request->estado;
        $cuenta->saldo = $request->saldo;
        $cuenta->iva = $request->iva;

        $cuenta->save();
        return redirect("/contabilidad/catalogo");
    }
}