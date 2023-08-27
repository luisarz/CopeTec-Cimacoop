<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\CatalogoTipo;
use App\Models\TipoCuentaCotableModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogoController extends Controller
{
    public function index(Request $request)
    {

        $filtro = $request->input('filtro');
        $cuentas = Catalogo::join('catalogo_tipo', 'catalogo_tipo.id_tipo_catalogo', '=', 'catalogo.tipo_catalogo')
            ->when(isset($request->filtro), function ($query) use ($filtro) {
                $query->where('catalogo.descripcion', 'LIKE', '%' . $filtro . '%')
                    ->orWhere('catalogo.numero', 'LIKE',  $filtro . '%');

            })
            ->select('catalogo_tipo.descripcion as catalogo', 'catalogo.*')
            ->orderBy('catalogo.id_cuenta', 'asc')
            ->paginate(10);

        return view('contabilidad.catalogo.index', compact('cuentas', 'filtro'));

    }

    public function add()
    {
        $cuentaPadre = Catalogo::all();
        $tipoCatalogo = TipoCuentaCotableModel::all();
        return view("contabilidad.catalogo.add", compact('tipoCatalogo', 'cuentaPadre'));
    }

    public function delete(Request $cuenta)
    {
        $cuenta = Catalogo::find($cuenta->id);
        $padreActual = $cuenta->id_cuenta_padre;
        while ($padreActual !== null) {
            $cuentaPadre = Catalogo::find($padreActual);
            $cuentaPadre->saldo = $cuentaPadre->saldo - $cuenta->saldo;
            $cuentaPadre->save();
            $padreActual = $cuentaPadre->id_cuenta_padre;
        }
        $cuenta->delete();
        return redirect("/contabilidad/catalogo");

    }
    public function post(Request $request)
    {
        $cuenta = new Catalogo();
        $cuenta->id_cuenta_padre = $request->id_cuenta_padre;
        $cuenta->numero = $request->numero;
        $cuenta->descripcion = $request->descripcion;
        $cuenta->tipo_catalogo = $request->tipo_catalogo;
        $cuenta->saldo = $request->saldo;
        $cuenta->movimiento = $request->movimiento;
        $cuenta->iva = $request->iva;

        $cuenta->tipo_reporte = $request->tipo_reporte;
        $cuenta->tipo_saldo_normal = $request->tipo_saldo_normal;
        $codigo_agrupador = null;
        if ($request->id_cuenta_padre != null) {
            $cuentaPadre = Catalogo::find($request->id_cuenta_padre);
            if ($cuentaPadre) {
                $codigo_agrupador = substr($cuentaPadre->numero, 0, 4); //obtener el codigo agrupador los primeros cuatro digitos del codigo de cuenta padre
            }
        }
        $cuenta->codigo_agrupador = $codigo_agrupador;
        $cuenta->estado = $request->estado;
        $cuenta->save();

        // while ($padreActual !== null) {
        //     $cuentaPadre = Catalogo::find($padreActual);
        //     $cuentaPadre->saldo = $cuentaPadre->saldo + $request->saldo;
        //     $cuentaPadre->save();
        //     $padreActual = $cuentaPadre->id_cuenta_padre;
        // }
        return redirect("/contabilidad/catalogo");
    }
    public function edit($id)
    {
        $cuenta = Catalogo::find($id);
        // $cuentaPadre = Catalogo::select('numero as numCuentaPadre', 'descripcion as descripcionPadre')->paginate(5);

        $tipoCatalogo = TipoCuentaCotableModel::all();

        return view('contabilidad.catalogo.edit', compact('cuenta', 'tipoCatalogo'));
    }
    public function put(Request $request)
    {
        $cuenta = Catalogo::find($request->id);
        $cuenta->id_cuenta_padre = $request->id_cuenta_padre;
        $cuenta->numero = $request->numero;
        $cuenta->descripcion = $request->descripcion;
        $cuenta->tipo_catalogo = $request->tipo_catalogo;
        $cuenta->saldo = $request->saldo;
        $cuenta->movimiento = $request->movimiento;
        $cuenta->iva = $request->iva;
        $cuenta->tipo_reporte = $request->tipo_reporte;
        $cuenta->tipo_saldo_normal = $request->tipo_saldo_normal;
        $codigo_agrupador = null;
        if ($request->id_cuenta_padre != null) {
            $cuentaPadre = Catalogo::find($request->id_cuenta_padre);
            if ($cuentaPadre) {
                $codigo_agrupador = substr($cuentaPadre->numero, 0, 4); //obtener el codigo agrupador los primeros cuatro digitos del codigo de cuenta padre
            }
        }
        $cuenta->codigo_agrupador = $codigo_agrupador;
        $cuenta->estado = $request->estado;
        $cuenta->save();
        return redirect("/contabilidad/catalogo");
    }
    public function getCuentasById($tipo_catalogo)
    {
        $cuentaPadre = Catalogo::where('tipo_catalogo', '=', $tipo_catalogo)->get();
        return response()->json([
            "cuentaPadre" => $cuentaPadre
        ]);

    }
}