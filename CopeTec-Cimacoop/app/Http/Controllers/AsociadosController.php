<?php

namespace App\Http\Controllers;

use App\Models\Asociados;
use App\Models\Beneficiarios;
use App\Models\Clientes;
use App\Models\Configuracion;
use Illuminate\Http\Request;
use \PDF;

class AsociadosController extends Controller
{
    private $estilos;
    private $stilosBundle;

    public function __construct()
    {
        $this->estilos = file_get_contents(public_path('assets/css/css.css'));
        $this->stilosBundle = file_get_contents(public_path('assets/css/style.bundle.css'));
    }

    public function index()
    {
      session()->put("estadoMenuminimizado", "1");

        $asociados = Asociados::join('clientes', 'asociados.id_cliente', '=', 'clientes.id_cliente')
        ->whereNotIn('clientes.estado',[0,7])
        ->paginate(10);

        return view("asociados.index", compact("asociados"));
    }

    public function add()
    {
        $clientes = Clientes::whereDoesntHave('asociado')->get();
        $asociadoNumero=Asociados::max('numero_asociado');
        $nuevoAsociadoNumero=str_pad($asociadoNumero+1,10,'0',STR_PAD_LEFT);
        $asociados = Asociados::join('clientes', 'asociados.id_cliente', '=', 'clientes.id_cliente')->get();
        return view("asociados.add", compact("clientes", "asociados","nuevoAsociadoNumero"));
    }

    public function edit($id)
    {
        $asociado = Asociados::findOrFail($id);
        $clientes = Clientes::where('nombre','!=','Bobeda General')->get();
        $asociados = Asociados::join('clientes', 'asociados.id_cliente', '=', 'clientes.id_cliente')
        ->get();
        return view("asociados.edit", compact("asociado", "asociados","clientes"));
    }


    public function post(Request $request)
    {

        $asociado = new Asociados();
        $asociado->id_cliente = $request->id_cliente;
        $asociado->sueldo_quincenal = $request->sueldo_quincenal;
        $asociado->sueldo_mensual = $request->sueldo_mensual;
        $asociado->otros_ingresos = $request->otros_ingresos;
        $asociado->dependientes_economicamente = $request->dependientes_economicamente;
        $asociado->referencia_asociado_uno = $request->referencia_asociado_uno;
        $asociado->referencia_asociado_dos = $request->referencia_asociado_dos;
        $asociado->couta_ingreso = $request->couta_ingreso;
        $asociado->monto_aportacion = $request->monto_aportacion;
        $asociado->fecha_ingreso=$request->fecha_ingreso;
        $asociado->estado_solicitud = 1;
        $asociado->numero_asociado=$request->numero_asociado;
        $asociado->save();
        return redirect("/asociados");
    }

    public function delete(Request $request)
    {
        Asociados::destroy($request->id);
        return redirect("/asociados");
    }

    public function put(Request $request)
    {
        $asociado = Asociados::findOrFail($request->id);
        $asociado->id_cliente = $request->id_cliente;
        $asociado->sueldo_quincenal = $request->sueldo_quincenal;
        $asociado->sueldo_mensual = $request->sueldo_mensual;
        $asociado->otros_ingresos = $request->otros_ingresos;
        $asociado->dependientes_economicamente = $request->dependientes_economicamente;
        $asociado->referencia_asociado_uno = $request->referencia_asociado_uno;
        $asociado->referencia_asociado_dos = $request->referencia_asociado_dos;
        $asociado->couta_ingreso = $request->couta_ingreso;
        $asociado->monto_aportacion = $request->monto_aportacion;
        $asociado->fecha_ingreso = $request->fecha_ingreso;
        $asociado->estado_solicitud = $request->estado_solicitud;
        $asociado->save();
        return redirect("/asociados");
    }
    public function solicitudIngreso($id)
    {
        $configuracion=Configuracion::first();
        $reporteName = 'SOLICITUD DE INGRESO';
        $asociado = Asociados::with('cliente')->findOrFail($id);

        $asociadoReferencia1=Asociados::with('cliente')->where('id_asociado',$asociado->referencia_asociado_uno)->first();
        $asociadoReferencia2=Asociados::with('cliente')->where('id_asociado',$asociado->referencia_asociado_dos)->first();

        $beneficiarios = Beneficiarios::with('cuenta', 'cuenta.tipo_cuenta')->where('id_asociado', '=', $id)
            ->join('parentesco', 'id_parentesco', '=', 'beneficiarios.parentesco')->get();

        $pdf = PDF::loadView('asociados.solicitud', [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'asociado' => $asociado,
            'configuracion' => $configuracion,
            'reporteName' => $reporteName,
            'asociadoReferencia1' => $asociadoReferencia1,
            'asociadoReferencia2' => $asociadoReferencia2,
            'beneficiarios' => $beneficiarios
        ]);
        return $pdf->setOrientation('portrait')->inline();
    }
}
