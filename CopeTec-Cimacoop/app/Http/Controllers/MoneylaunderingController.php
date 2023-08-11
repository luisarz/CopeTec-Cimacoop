<?php

namespace App\Http\Controllers;

use App\Models\Cajas;
use App\Models\Credito;
use App\Models\Empleados;
use App\Notifications\MoneylaunderingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Notification;

class MoneylaunderingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = DB::table('notifications')->get();
        return view('alerts.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $emp = Empleados::find(auth()->user()->id_empleado_usuario);
        $caja = Cajas::find($request->id_caja);
        $credito = Credito::find($request->id_credito);
        // overriding values to create notification
        $credito->monto_saldo = $request->monto_saldo;
        $credito->justificante = $request->justificante;
        $credito->comprobante = $request->comprobante;
        $credito->id_caja = $request->id_caja;
        $credito->numero_caja = $caja->numero_caja;
        $credito->cobrado_por = $emp->nombre_empleado;
        // dd($credito);
        Notification::send($credito, new MoneylaunderingNotification($credito));
        return response('alert_created', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
