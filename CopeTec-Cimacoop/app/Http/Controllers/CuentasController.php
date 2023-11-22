<?php

namespace App\Http\Controllers;

use App\Models\Asociados;
use App\Models\Cajas;
use App\Models\Cuentas;
use App\Models\LibretasModel;
use App\Models\Movimientos;
use App\Models\TipoCuenta;
use Illuminate\Http\Request;

class CuentasController extends Controller
{
    public function index()
    {
        $cuentas = Cuentas::join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->whereNotIn('clientes.estado', [0, 7])
            ->distinct()
            ->orderby('cuentas.created_at', 'desc')
            ->select('cuentas.*', 'clientes.nombre as nombre_cliente', 'clientes.dui_cliente as dui_cliente', 'tipos_cuentas.descripcion_cuenta as tipo_cuenta')
            ->get();

        return view("cuentas.index", compact("cuentas"));
    }

    public function getLibreta($id_cuenta)
    {
        $libreta = LibretasModel::where("id_cuenta", "=", $id_cuenta)->where('estado', '1')->first();

        if ($libreta) {
            $numMovimiento = Movimientos::where("id_libreta", "=", $libreta->id_libreta)->max('num_movimiento_libreta');
            $proximoMovimiento = $numMovimiento + 1;
            return response()->json([
                "response" => "ok",
                "libreta" => $libreta->id_libreta,
                "num_movimiento_libreta" => $proximoMovimiento,

            ]);
        } else {
            return response()->json([
                "response" => "error",
                "libreta" => ""

            ]);
        }
    }
    public function add()
    {


        $id_empleado_usuario = session()->get('id_empleado_usuario');
        $cajaAperturada = Cajas::join('apertura_caja', 'apertura_caja.id_caja', '=', 'cajas.id_caja')
            ->where("estado_caja", '=', '1')
            ->where('id_usuario_asignado', '=', $id_empleado_usuario)
            ->select('cajas.id_caja', 'cajas.saldo', 'cajas.numero_caja', 'cajas.id_usuario_asignado', 'apertura_caja.monto_apertura', 'apertura_caja.fecha_apertura')
            ->first();
        if (is_null($cajaAperturada)) {
            return redirect("/apertura")->withErrors('No tienes caja aperturada, te redirigimos aqui, para que puedas aperturala y poder realizar movimientos.');
        }
        $id_caja = $cajaAperturada->id_caja;

        $asociados = Asociados::join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->whereNotIn('clientes.estado', [0, 7])->get(); //El cliente no este desactivado ni sea la bobeda
        $tiposcuentas = TipoCuenta::all();




        return view("cuentas.add", compact("asociados", "tiposcuentas", 'id_caja'));
    }
    public function addcuentacompartida()
    {
        $asociados = Asociados::join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->whereNotIn('clientes.estado', [0, 7])->get(); //El cliente no este desactivado ni sea la bobeda
        $tiposcuentas = TipoCuenta::all();



        return view("cuentas.addcuentacompartida", compact("asociados", "tiposcuentas"));
    }

    public function edit($id)
    {
        $cliente = Cuentas::findOrFail($id);
        return view("cuentas.edit", compact("cliente"));
    }


    public function post(Request $request)
    {
        $cuenta = Cuentas::where("id_asociado", $request->id_asociado)
            ->where('id_tipo_cuenta', $request->id_tipo_cuenta)
            ->where('numero_cuenta', $request->numero_cuenta)
            ->where('estado', 1)
            ->first();
        if ($cuenta && $cuenta->count() > 0) {
            return redirect("/cuentas/add")->withInput()->withErrors(["dui_cliente" => "Ya existe un Asociado  con este DUI!!"]);
        } else {
            $cuenta = new Cuentas();
            $cuenta->id_asociado = $request->id_asociado;
            $cuenta->id_tipo_cuenta = $request->id_tipo_cuenta;
            $cuenta->numero_cuenta = $request->numero_cuenta;
            $cuenta->monto_apertura = $request->monto_apertura;
            $cuenta->fecha_apertura = $request->fecha_apertura;
            $cuenta->saldo_cuenta = $request->monto_apertura;
            $cuenta->id_asociado_comparte = $request->id_asociado_comparte ?? null;
            $cuenta->id_interes = $request->id_interes_tipo_cuenta;
            $cuenta->estado = 1;
            $cuenta->save();

            //Crear la libreta

            $libreta = new LibretasModel();
            $numLibreta = LibretasModel::max('numero');
            $libreta->numero = $numLibreta + 1;
            $libreta->id_cuenta = $cuenta->id_cuenta;
            $libreta->fecha_apertura = now();
            $libreta->estado = 1;
            $libreta->save();


            $asociado = Asociados::join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
                ->where('asociados.id_asociado', '=', $request->id_asociado)->first();


            $movimiento = new Movimientos();
            $movimiento->id_cuenta = $cuenta->id_cuenta;
            $movimiento->tipo_operacion = 1; //Deposito por apertura de cuenta
            $movimiento->monto = $request->monto_apertura;
            $movimiento->cajero_operacion = session()->get('id_empleado_usuario');
            $movimiento->id_caja = $request->id_caja;
            $movimiento->fecha_operacion = now();
            $movimiento->dui_transaccion = $asociado->dui_cliente; //Obtener los datos del cliente
            $movimiento->cliente_transaccion = $asociado->nombre;
            $movimiento->observacion = 'Deposito por apertura de cuenta';
            $movimiento->estado = 1;
            $movimiento->saldo = $request->monto_apertura;
            $movimiento->impreso = 0;
            $movimiento->num_movimiento_libreta = 1;
            $movimiento->id_libreta = $libreta->id_libreta;
            $movimiento->save();




            //

            return redirect("/cuentas");
        }
    }



    public function put(Request $request)
    {
        $cliente = Cuentas::findOrFail($request->id);
        if ($cliente->dui_cliente != $request->dui_cliente) {
            $cliente = Cuentas::where("dui_cliente", $request->dui_cliente)->first();
            if ($cliente && $cliente->count() > 0) {
                return redirect("/cuentas/" . $request->id)->withInput()->withErrors(["dui_cliente" => "Cambió el DUI y el ingresado ya existe en otro cliente!!"]);
            }
        } else {
            $cliente->nombre = $request->nombre;
            $cliente->genero = $request->genero;
            $cliente->fecha_nacimiento = $request->fecha_nacimiento;
            $cliente->dui_cliente = $request->dui_cliente;
            $cliente->dui_extendido = $request->dui_extendido;
            $cliente->fecha_expedicion = $request->fecha_expedicion;
            $cliente->telefono = $request->telefono;
            $cliente->nacionalidad = $request->nacionalidad;
            $cliente->estado_civil = $request->estado_civil;
            $cliente->direccion_personal = $request->direccion_personal;
            $cliente->direccion_negocio = $request->direccion_negocio;
            $cliente->nombre_negocio = $request->nombre_negocio;
            $cliente->tipo_vivienda = $request->tipo_vivienda;
            $cliente->observaciones = $request->observaciones;
            $cliente->estado = 1;
            $cliente->save();
            return redirect("/cuentas");
        }
    }

    public function getCuenta($id)
    {
        $cuenta = Cuentas::find($id);
        $saldo_cuenta_formateado = null;
        $libreta = LibretasModel::where("id_cuenta", "=", $id)->where('estado', '1')->first();


        if ($cuenta) {
            $saldo_cuenta_formateado = number_format($cuenta->saldo_cuenta, 2, '.', ',');
        }
        if ($libreta) {
            $numMovimiento = Movimientos::where("id_libreta", "=", $libreta->id_libreta)->max('num_movimiento_libreta');
            $proximoMovimiento = $numMovimiento + 1;
            $msg = "ok";
        } else {
            $proximoMovimiento = 0;
            $msg = "error";
        }
        return response()->json([
            'saldo_cuenta_formateado' => $saldo_cuenta_formateado != null ? $saldo_cuenta_formateado : 0,
            'saldo_cuenta_sin_formato' => $cuenta ? $cuenta->saldo_cuenta : 0,
            'proximoMovimiento' => $proximoMovimiento,
            "response" => $msg,
            "libreta" => $libreta->id_libreta,
            "num_movimiento_libreta" => $proximoMovimiento,


        ]);
    }
    public function anularCuenta(Request $request)
    {
        $cuenta = Cuentas::findOrFail($request->id_cuenta_anular);
        $cuenta->estado = 0;
        $cuenta->save();
        return redirect("/cuentas");
    }
    public function getCuentasDisponibles($id)
    {
        $cuenta_origen = Cuentas::with('libreta')->find($id);
        $cuentas = Cuentas::join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->join('libretas', 'libretas.id_cuenta', '=', 'cuentas.id_cuenta')
            ->whereNotIn('clientes.estado', [0, 7])
            ->where('cuentas.id_cuenta', '!=', $id)
            ->distinct()
            ->orderby('clientes.nombre', 'asc')
            ->select(
                'cuentas.*',
                'clientes.nombre as nombre_cliente',
                'clientes.dui_cliente as dui_cliente',
                'tipos_cuentas.descripcion_cuenta as tipo_cuenta',
                'libretas.numero as numero_libreta'
            )
            ->get();
        return response()->json([
            'cuentas' => $cuentas,
            'saldo_disponible' => $cuenta_origen->saldo_cuenta,
            'id_libreta' => isset($cuenta_origen->libreta)? $cuenta_origen->libreta->id_libreta:'',
        ]);
    }
    public function getCuentasByAsociado($id)
    {
        $cuentas = Cuentas::join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->whereNotIn('clientes.estado', [0, 7])
            ->where('asociados.id_asociado', '=', $id)
            ->distinct()
            ->orderby('clientes.nombre', 'asc')
            ->select('cuentas.id_cuenta', 'cuentas.id_asociado', 'cuentas.numero_cuenta', 'cuentas.id_cuenta', 'clientes.nombre as nombre_cliente', 'clientes.dui_cliente as dui_cliente', 'tipos_cuentas.descripcion_cuenta as tipo_cuenta')
            ->get();
        return response()->json([
            'cuentas' => $cuentas,
        ]);
    }

    public function getMovimientosSinImprimir($id)
    {

        $movimientos = Movimientos::join('cajas', 'movimientos.id_caja', '=', 'cajas.id_caja')
            ->where('id_cuenta', $id)
            ->select(
                'movimientos.num_movimiento_libreta',
                'movimientos.id_movimiento',
                'movimientos.id_cuenta',
                'movimientos.tipo_operacion',
                'movimientos.monto',
                'movimientos.saldo',
                'movimientos.fecha_operacion',
                'movimientos.id_caja',
                'cajas.numero_caja'
            )->orderby('movimientos.fecha_operacion')
            ->get();
            // dd($movimientos);
        $movimientosPendientes = 0;
        if ($movimientos) {
            $movimientosPendientes = $movimientos->count();
        }
        return response()->json([
            'movimientos' => $movimientos,
            'movimientosPendientes' => $movimientosPendientes,
        ]);
    }
}
