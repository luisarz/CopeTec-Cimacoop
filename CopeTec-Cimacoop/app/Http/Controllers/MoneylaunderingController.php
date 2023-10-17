<?php

namespace App\Http\Controllers;

use App\Models\Cajas;
use App\Models\Clientes;
use App\Models\Credito;
use App\Models\Empleados;
use App\Notifications\MoneylaunderingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use \PDF;

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
        return response()->json([
            'message' => 'alert created',
            'codeResponse' => '200',
        ]);
    }

    
    public function clientsReport()
    {
        $clients =   Clientes::all();
        // $pdf->setOptions([
        //     'enable-local-file-access' => true
        // ]);
        $pdf = PDF::loadView('reportes.clients.index', [
            'clients' => $clients
        ]);

        return $pdf->setOrientation('portrait')->inline();
        // return view('reportes.clients.index', compact('clients'));
    }
    public function clientReport(string $id)
    {
        $client =   Clientes::find($id);
        // $pdf = \App::make('snappy.pdf');

        // $pdf->setOptions([
        //     'enable-local-file-access' => true
        // ]);
        $pdf = PDF::loadView('reportes.clients.client', [
            'client' => $client
        ]);

        return $pdf->setOrientation('portrait')->inline();
        // return view('reportes.clients.index', compact('clients'));
    }
    public function activeReport()
    {
        $clients =   DB::table('clientes')->get();
        // $pdf = \App::make('snappy.pdf');

        // $pdf->setOptions([
        //     'enable-local-file-access' => true
        // ]);
        $pdf = PDF::loadView('reportes.clients.active', [
            'clients' => $clients
        ]);

        return $pdf->setOrientation('portrait')->inline();
        // return view('reportes.clients.index', compact('clients'));
    }
    public function empReport()
    {
        $clients =   Clientes::orderBy('nombre', 'asc')->get();
        // $pdf = \App::make('snappy.pdf');

        // $pdf->setOptions([
        //     'enable-local-file-access' => true
        // ]);
        $pdf = PDF::loadView('reportes.clients.empleados', [
            'clients' => $clients
        ]);

        return $pdf->setOrientation('portrait')->inline();
        // return view('reportes.clients.index', compact('clients'));
    }
}
