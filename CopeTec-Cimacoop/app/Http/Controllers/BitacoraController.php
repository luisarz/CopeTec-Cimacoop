<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function index(Request $request)
    {
        $desde = $request->input('desde');
        $hasta = $request->input('hasta') .' 23:59:59';

        $bitacora = Bitacora::when(isset($desde) && isset($hasta), function ($query) use ($desde, $hasta) {
            $query->whereBetween('fecha', [$desde, $hasta]);
        })
            ->when(!isset($desde) || !isset($hasta), function ($query) {
                $query->orderBy('fecha', 'desc');
            })
            ->paginate(10);





        return view('bitacora.index', compact('bitacora', 'desde', 'hasta'));




    }
}