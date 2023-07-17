<?php

namespace App\Http\Controllers;

use App\Models\BeneficiarosDepositos;
use App\Models\Bobeda;
use App\Models\BobedaMovimientos;
use App\Models\Clientes;
use App\Models\Cuentas;
use App\Models\DepositosPlazo;
use App\Models\Empleados;
use App\Models\Movimientos;
use App\Models\ReferenciaSolicitud;
use App\Models\SolicitudCredito;
use App\Models\SolicitudCreditoBienes;
use Carbon\Carbon;
use DateTime;
use Luecano\NumeroALetras\NumeroALetras;
use \PDF;
use App\Helpers\ConversionHelper;


class ReportesController extends Controller
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
        $pdf = \App::make('snappy.pdf');
        //return view("welcome");
        $pdf = PDF::loadView('reportes.test.index');
        //return view("Reportes.informeclientediario",compact('reporte'));
        return $pdf->setOrientation('landscape')->inline();
    }
    public function RepMovimientosBobeda($id)
    {

        $today = Carbon::today();
        $bobeda = Bobeda::first();

        $movimientoBobeda = BobedaMovimientos::join('cajas', 'cajas.id_caja', 'bobeda_movimientos.id_caja')
            ->where('bobeda_movimientos.fecha_operacion', '>=', $today)
            ->orderBy('bobeda_movimientos.id_bobeda_movimiento', 'asc')
            ->paginate(10);


        $aperturaCaja = BobedaMovimientos::where('tipo_operacion', 3)
            ->where('fecha_operacion', '>=', today())
            ->select('monto', 'fecha_operacion')->first();


        $trasladoACaja = BobedaMovimientos::where('tipo_operacion', '1')
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');
        $recibidoDeCaja = BobedaMovimientos::where('tipo_operacion', '2')
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');

        $cancelados = BobedaMovimientos::whereIn('tipo_operacion', [1, 2])
            ->where('estado', '=', '3')
            ->where('fecha_operacion', '>=', today())
            ->sum('monto');


        $pdf = \App::make('snappy.pdf');

        $pdf->setOptions([
            'enable-local-file-access' => true
        ]);

        $pdf = PDF::loadView('reportes.movimientosBobeda', [
            'movimientoBobeda' => $movimientoBobeda,
            'trasladoACaja' => $trasladoACaja,
            'recibidoDeCaja' => $recibidoDeCaja,
            'aperturaCaja' => $aperturaCaja,
            'estilos' => $this->estilos,
            'bobeda' => $bobeda,
            'cancelados' => $cancelados,
        ]);

        return $pdf->setOrientation('portrait')->inline();

    }
    public function ComprobanteMovimiento($id)
    {
        $idMovimiento = $id;

        $movimiento = Movimientos::join('cuentas', 'cuentas.id_cuenta', '=', 'movimientos.id_cuenta')
            ->join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->join('cajas', 'cajas.id_caja', '=', 'movimientos.id_caja')
            ->join('empleados', 'empleados.id_empleado', '=', 'cajas.id_usuario_asignado')
            ->where('movimientos.id_movimiento', '=', $idMovimiento)
            ->select('movimientos.*', 'clientes.nombre', 'tipos_cuentas.descripcion_cuenta', 'cuentas.numero_cuenta', 'clientes.dui_cliente', 'clientes.direccion_personal', 'empleados.nombre_empleado')
            ->first();


        $formatter = new NumeroALetras();
        $numeroEnLetras = $formatter->toInvoice($movimiento->monto, 2, 'DoLARES');
        $pdf = \App::make('snappy.pdf');
        $pdf = PDF::loadView('reportes.caja.comprobante', [
            'movimiento' => $movimiento,
            'estilos' => $this->estilos,
            'numeroEnLetras' => $numeroEnLetras
        ]);
        return $pdf->setOrientation('portrait')->inline();
    }
    public function comprobanteBobeda($id)
    {
        $idMovimiento = $id;

        $movimientoBobeda = BobedaMovimientos::join('cajas', 'cajas.id_caja', 'bobeda_movimientos.id_caja')
            ->join('empleados', 'empleados.id_empleado', '=', 'cajas.id_usuario_asignado')
            ->where('bobeda_movimientos.id_bobeda_movimiento', '=', $idMovimiento)
            ->orderBy('bobeda_movimientos.id_bobeda_movimiento', 'desc')
            ->select('bobeda_movimientos.*', 'cajas.*', 'empleados.nombre_empleado as nombre_empleado')
            ->first();

        $empleados = Empleados::where('id_empleado', '=', $movimientoBobeda->id_empleado)->first();

        $formatter = new NumeroALetras();
        $numeroEnLetras = $formatter->toInvoice($movimientoBobeda->monto, 2, 'DoLARES');
        $pdf = \App::make('snappy.pdf');
        $pdf = PDF::loadView('reportes.bobeda.comprobante', [
            'movimiento' => $movimientoBobeda,
            'estilos' => $this->estilos,
            'numeroEnLetras' => $numeroEnLetras,
            'bobeda_empleado' => $empleados->nombre_empleado
        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    public function RepEstadoCuenta($id)
    {
        $idCuenta = $id;
        $movimientosCuenta = Movimientos::join('cuentas', 'cuentas.id_cuenta', '=', 'movimientos.id_cuenta')
            ->join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->select('movimientos.*', 'cuentas.*', 'clientes.nombre as nombre_cliente', 'clientes.dui_cliente', 'clientes.id_cliente', 'tipos_cuentas.descripcion_cuenta as tipo_cuenta')
            ->where('cuentas.id_cuenta', '=', $idCuenta)
            ->get();
        if ($movimientosCuenta->count() == 0) {
            return redirect()->back()->with('error', 'La cuenta no tiene movimientos');
        }

        $clienteData = Clientes::find($movimientosCuenta[0]->id_cliente);

        $formatter = new NumeroALetras();
        $numeroEnLetras = $formatter->toInvoice($movimientosCuenta[0]->saldo_cuenta, 2, 'DOLARES');
        $pdf = \App::make('snappy.pdf');
        $pdf = PDF::loadView('reportes.cuentas.estadoCuenta', [
            'movimientos' => $movimientosCuenta,
            'estilos' => $this->estilos,
            'numeroEnLetras' => $numeroEnLetras,
            'clienteData' => $clienteData
        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    public function contrato($id)
    {
        $idCuenta = $id;

        $datosContrato = Cuentas::join('tipos_cuentas', 'tipos_cuentas.id_tipo_cuenta', '=', 'cuentas.id_tipo_cuenta')
            ->join('asociados', 'asociados.id_asociado', '=', 'cuentas.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('intereses_tipo_cuenta', 'intereses_tipo_cuenta.id_tipo_cuenta', '=', 'tipos_cuentas.id_tipo_cuenta')
            ->select('cuentas.*', 'clientes.*', 'tipos_cuentas.descripcion_cuenta as tipo_cuenta', 'intereses_tipo_cuenta.interes', 'asociados.fecha_ingreso')
            ->where('cuentas.id_cuenta', '=', $idCuenta)
            ->first();

        $fechaNacimiento = new DateTime($datosContrato->fecha_nacimiento);
        $fechaActual = new DateTime();
        $edad = $fechaNacimiento->diff($fechaActual)->y;
        $beneficiarios = Cuentas::join('beneficiarios', 'beneficiarios.id_cuenta', '=', 'cuentas.id_cuenta')->get();
        $formatter = new NumeroALetras();
        $numeroEnLetras = $formatter->toInvoice($datosContrato->monto_apertura, 2, 'DoLARES');

        $pdf = \App::make('snappy.pdf');
        $pdf = PDF::loadView('reportes.cuentas.contrato', [
            'estilos' => $this->estilos,
            'datosContrato' => $datosContrato,
            'beneficiarios' => $beneficiarios,
            'edad' => $edad,
            'numeroEnLetras' => $numeroEnLetras
        ]);
        return $pdf->setOrientation('portrait')->inline();
    }

    public function certificadoDeposito($id)
    {
        $idCuenta = $id;

        $datosContrato = DepositosPlazo::join('asociados', 'depositos_plazo.id_asociado', '=', 'asociados.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('plazos_tasas', 'plazos_tasas.id_tasa', '=', 'depositos_plazo.interes_deposito')
            ->join('cuentas', 'cuentas.id_cuenta', '=', 'depositos_plazo.id_cuenta_depositar')
            ->where('depositos_plazo.id_deposito_plazo_fijo', "=", $id)
            ->orderBy('depositos_plazo.numero_certificado', 'desc')
            ->first();
        // dd($datosContrato);
        $fechaActual = new DateTime();
        $beneficiarios = BeneficiarosDepositos::where('id_deposito', '=', $id)
            ->join('parentesco', 'parentesco.id_parentesco', '=', 'beneficiarios_depositos.parentesco')->get();

        $formatter = new NumeroALetras();
        $numeroEnLetras = $formatter->toInvoice($datosContrato->monto_deposito, 2, 'DLARES');
        $img = public_path('assets/media/logos/certificado_fondo.jpg');

        $pdf = \App::make('snappy.pdf');
        $pdf = PDF::loadView('reportes.depositoplazo.certificado', [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'datosContrato' => $datosContrato,
            'beneficiarios' => $beneficiarios,
            'numeroEnLetras' => $numeroEnLetras,
            'fondo' => $img
        ]);
        return $pdf->setOrientation('landscape')->inline();

    }

    public function solicitudCredito($idSolicitud)
    {

        $solicitud = SolicitudCredito::join('clientes', 'clientes.id_cliente', '=', 'solicitud_credito.id_cliente')
            ->orderBy('solicitud_credito.fecha_solicitud')
           ->where('solicitud_credito.id_solicitud', '=', $idSolicitud)->first();

        $conyugue = Clientes::where('id_cliente', '=', $solicitud->id_conyugue)->first();

        $referencias = ReferenciaSolicitud::join('referencias', 'referencias.id_referencia', '=', 'referencia_solicitud.id_referencia')
            ->where('referencia_solicitud.id_solicitud', '=', $idSolicitud)->get();

        $bienes = SolicitudCreditoBienes::where('id_solicitud', '=', $idSolicitud)->get();


        $formatter = new NumeroALetras();
        $cuotaEnLetras = $formatter->toInvoice($solicitud->cuota, 2, 'DÓLARES');
        $montoSolicitadoEnLetras = $formatter->toInvoice($solicitud->monto_solicitado, 2, 'DÓLARES');
        $hoy = new DateTime();
        $nacimiento = new DateTime($solicitud->fecha_nacimiento);
        $edad = $hoy->diff($nacimiento);
        $edadCliente= $edad->y;
     
        $edadConyugue = null;
        if ($conyugue==null) {
           $conyugue= new Clientes();
        }else{
            $nacimientoConyugue = new DateTime($conyugue->fecha_nacimiento);
            $edadConyugue = $hoy->diff($nacimientoConyugue);
            $edadConyugue = $edadConyugue->y;
        }

        $pdf = \App::make('snappy.pdf');
        $pdf = PDF::loadView('reportes.creditos.solicitud', [
            'estilos' => $this->estilos,
            'stilosBundle' => $this->stilosBundle,
            'solicitud' => $solicitud,
            'referencias' => $referencias,
            'bienes'=>$bienes,
            'edadCliente'=>$edadCliente,
            'conyugue'=>$conyugue,
            'cuotaEnLetras' => $cuotaEnLetras,
            'edadConyugue'=>$edadConyugue,
            'montoSolicitadoEnLetras'=>$montoSolicitadoEnLetras
        ]);
        return $pdf->setOrientation('portrait')->inline();

    }
    public function pagareCredito($idSolicitud)
    {

        $solicitud = SolicitudCredito::join('clientes', 'clientes.id_cliente', '=', 'solicitud_credito.id_cliente')
            ->orderBy('solicitud_credito.fecha_solicitud')
            ->where('solicitud_credito.id_solicitud', '=', $idSolicitud)->first();

     

        $formatter = new NumeroALetras();
        $cuotaEnLetras = $formatter->toInvoice($solicitud->cuota, 2, 'DÓLARES  ');
        $montoSolicitadoEnLetras = $formatter->toInvoice($solicitud->monto_solicitado, 2, 'DÓLARES  ');
        $tasaEnletras= $formatter->toWords($solicitud->tasa);
        $plazoEnLetras= $formatter->toWords($solicitud->plazo);
        $hoy = new DateTime();
        $nacimiento = new DateTime($solicitud->fecha_nacimiento);
        $edad = $hoy->diff($nacimiento);
        $edadCliente = $edad->y;
        


        $pdf = \App::make('snappy.pdf');
        $pdf = PDF::loadView('reportes.creditos.pagare', [
            'estilos' => $this->estilos,
            'solicitud' => $solicitud,
            'edadCliente' => $edadCliente,
            'tasaEnletras'=>$tasaEnletras,
            'plazoEnLetras'=>$plazoEnLetras,
            'cuotaEnLetras' => $cuotaEnLetras,
            'montoSolicitadoEnLetras' => $montoSolicitadoEnLetras
        ]);
        return $pdf->setOrientation('portrait')->inline();

    }
}