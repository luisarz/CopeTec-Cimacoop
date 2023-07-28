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

        $numeroValue = '22010102';

        $results = DB::select("
  WITH RECURSIVE superior_accounts AS (
    -- Base case: select the initial account
    SELECT numero, descripcion
    FROM catalogo
    WHERE numero = ?
    
    UNION ALL
    
    -- Recursive part: select the superior accounts iteratively
    SELECT 
      SUBSTRING(sa.numero, 1, LENGTH(sa.numero) - 2) AS numero, c.descripcion
    FROM superior_accounts sa
    JOIN catalogo c ON SUBSTRING(sa.numero, 1, LENGTH(sa.numero) - 2) = c.numero
    WHERE LENGTH(sa.numero) >= 2 AND LENGTH(c.numero) >= 2 
    -- Stop when the length is less than 2 (root account)
  )
  SELECT * FROM superior_accounts
  ORDER BY numero ASC;
", [$numeroValue]);

        // $results now contains the recursive results from the '11040101' account code and its superior accounts


        // dd($results);


        $filtro = $request->input('filtro');
        $cuentas = Catalogo::join('catalogo_tipo', 'catalogo_tipo.id_tipo_catalogo', '=', 'catalogo.tipo_catalogo')
            ->when(isset($request->filtro), function ($query) use ($filtro) {
                $query->where('catalogo.descripcion', 'LIKE', '%' . $filtro . '%')
                    ->orWhere('catalogo.numero', 'LIKE', '%' . $filtro . '%');

            })
            ->select('catalogo_tipo.descripcion as catalogo', 'catalogo.*')
            ->orderBy('catalogo.id_cuenta', 'asc')
            ->paginate(10);
        // dd($cuentas);

        return view('contabilidad.catalogo.index', compact('cuentas', 'filtro'));

    }

    public function add()
    {
        $tipoCatalogo = TipoCuentaCotableModel::all();
        return view("contabilidad.catalogo.add", compact('tipoCatalogo'));
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
        $cuenta->movimiento = $request->movimiento;

        $cuenta->saldo = $request->saldo;
        $cuenta->iva = $request->iva;
        $cuenta->save();
        return redirect("/contabilidad/catalogo");
    }
    public function edit($id)
    {
        $cuenta = Catalogo::find($id);
        $tipoCatalogo = TipoCuentaCotableModel::all();

        return view('contabilidad.catalogo.edit', compact('cuenta', 'tipoCatalogo'));
    }
    public function put(Request $request)
    {
        $cuenta = Catalogo::find($request->id);
        $cuenta->numero = $request->numero;
        $cuenta->descripcion = $request->descripcion;
        $cuenta->movimiento = $request->movimiento;
        $cuenta->estado = $request->estado;
        $cuenta->saldo = $request->saldo;
        $cuenta->iva = $request->iva;
        $cuenta->save();
        return redirect("/contabilidad/catalogo");
    }
}