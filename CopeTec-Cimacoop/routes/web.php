<?php

use App\Http\Controllers\AperturaCajaController;
use App\Http\Controllers\BeneficiarosDepositosController;
use App\Http\Controllers\BobedaController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\DepositosPlazoController;
use App\Http\Controllers\LiquidacionController;
use App\Http\Controllers\PartidaContableDetalleController;
use App\Http\Controllers\PartidasContablesController;
use App\Http\Controllers\PlazosController;
use App\Http\Controllers\ReferenciaSolicitudController;
use App\Http\Controllers\SolicitudCreditoBienesController;
use App\Http\Controllers\SolicitudCreditoController;
use App\Http\Controllers\TasasPlazosController;
use App\Http\Controllers\TempPasswordController;
use App\Http\Controllers\TipoCuentaCotableController;
use App\Http\Controllers\TiposPartidasContablesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TipoCuentaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ReferenciasController;
use App\Http\Controllers\AsociadosController;
use App\Http\Controllers\BeneficiariosController;
use App\Http\Controllers\InteresesTipoCuentaController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\CajasController;
use App\Http\Controllers\MovimientosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\CreditoController;
use App\Http\Controllers\DeclaracionJuradaController;
use App\Http\Controllers\MoneylaunderingController;
use App\Http\Controllers\ParameterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');


Route::get('/login', [LoginController::class, 'index'])->name("login");
Route::post('/login', [LoginController::class, 'login']);
Route::get('/reset-password', [LoginController::class, 'recoveryPassword']);
Route::post('/send-password', [LoginController::class, 'sendEmailRecoveryPassword']);
Route::get('/set-new-password', [LoginController::class, 'setNewPassword'])->middleware(['auth', 'bitacora']);
Route::post('/set-new-password', [LoginController::class, 'setPassword'])->middleware(['auth', 'bitacora']);


/*
Dashboard Route
 */
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/configuracion', [ConfiguracionController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::post('/configuracion/update', [ConfiguracionController::class, 'update'])->middleware(['auth', 'bitacora']);


/*
User Route
 */
Route::get('/user', [UserController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/user/add', [UserController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/user/add', [UserController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::delete('/user/delete', [UserController::class, 'delete'])->middleware(['auth', 'bitacora']);
Route::get('/user/{id}', [UserController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/user/put', [UserController::class, 'put'])->middleware(['auth', 'bitacora']);


/*
Rol Route
 */
Route::get('/rol', [RolController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/rol/add', [RolController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/rol/add', [RolController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::delete('/rol/delete', [RolController::class, 'delete'])->middleware(['auth', 'bitacora']);
Route::get('/rol/{id}', [RolController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/rol/put', [RolController::class, 'put'])->middleware(['auth', 'bitacora']);

/*
TiposCuentas Route
 */
Route::get('/tipoCuenta', [TipoCuentaController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/tipoCuenta/add', [TipoCuentaController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/tipoCuenta/add', [TipoCuentaController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::delete('/tipoCuenta/delete', [TipoCuentaController::class, 'delete'])->middleware(['auth', 'bitacora']);
Route::get('/tipoCuenta/{id}', [TipoCuentaController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/tipoCuenta/put', [TipoCuentaController::class, 'put'])->middleware(['auth', 'bitacora']);

/*
Empleados Route
 */
Route::get('/empleados', [EmpleadoController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/empleados/add', [EmpleadoController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/empleados/add', [EmpleadoController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::delete('/empleados/delete', [EmpleadoController::class, 'delete'])->middleware(['auth', 'bitacora']);
Route::get('/empleados/{id}', [EmpleadoController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/empleados/put', [EmpleadoController::class, 'put'])->middleware(['auth', 'bitacora']);

/*
Clientes Route
 */
Route::get('/clientes', [ClientesController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/clientes/add', [ClientesController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/clientes/add', [ClientesController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::delete('/clientes/delete', [ClientesController::class, 'delete'])->middleware(['auth', 'bitacora']);
Route::get('/clientes/{id}', [ClientesController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::get('/clientes/getClienteData/{id}', [ClientesController::class, 'getClienteData'])->middleware(['auth', 'bitacora']);
Route::put('/clientes/put', [ClientesController::class, 'put'])->middleware(['auth', 'bitacora']);

/*
Referencias Route
 */
Route::get('/referencias', [ReferenciasController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/referencias/add', [ReferenciasController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/referencias/add', [ReferenciasController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::delete('/referencias/delete', [ReferenciasController::class, 'delete'])->middleware(['auth', 'bitacora']);
Route::get('/referencias/{id}', [ReferenciasController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/referencias/put', [ReferenciasController::class, 'put'])->middleware(['auth', 'bitacora']);


/*
Asociados Route
 */
Route::get('/asociados', [AsociadosController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/asociados/add', [AsociadosController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/asociados/add', [AsociadosController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::delete('/asociados/delete', [AsociadosController::class, 'delete'])->middleware(['auth', 'bitacora']);
Route::get('/asociados/{id}', [AsociadosController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/asociados/put', [AsociadosController::class, 'put'])->middleware(['auth', 'bitacora']);

/*
Beneficiarios Route
 */
Route::get('/beneficiarios/{id_asociado?}', [BeneficiariosController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/beneficiarios/add/{id}', [BeneficiariosController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/beneficiarios/add', [BeneficiariosController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::delete('/beneficiarios/delete', [BeneficiariosController::class, 'delete'])->middleware(['auth', 'bitacora']);
Route::get('/beneficiarios/edit/{id_registro}', [BeneficiariosController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/beneficiarios/put', [BeneficiariosController::class, 'put'])->middleware(['auth', 'bitacora']);

/*
Interes tipos cuenta Route
 */
Route::get('/intereses/{id_asociado?}', [InteresesTipoCuentaController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/intereses/add/{id}', [InteresesTipoCuentaController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/intereses/add', [InteresesTipoCuentaController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::delete('/intereses/delete', [InteresesTipoCuentaController::class, 'delete'])->middleware(['auth', 'bitacora']);
Route::get('/intereses/edit/{id_registro}', [InteresesTipoCuentaController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/intereses/put', [InteresesTipoCuentaController::class, 'put'])->middleware(['auth', 'bitacora']);
//Ruta para cargar los datos al cambiar el tipo de cuenta
Route::get('intereses/getIntereses/{id}', [InteresesTipoCuentaController::class, 'getIntereses'])->middleware(['auth', 'bitacora']);



/*
Cuentas Route
 */
Route::get('/cuentas', [CuentasController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/cuentas/add', [CuentasController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::get('/cuentas/addcuentacompartida', [CuentasController::class, 'addcuentacompartida'])->middleware(['auth', 'bitacora']);
Route::post('/cuentas/add', [CuentasController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::post('/cuentas/anularCuenta', [CuentasController::class, 'anularCuenta'])->middleware(['auth', 'bitacora']);
Route::get('/cuentas/{id}', [CuentasController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/cuentas/put', [CuentasController::class, 'put'])->middleware(['auth', 'bitacora']);
Route::get('/cuentas/getCuentasDisponibles/{id}', [CuentasController::class, 'getCuentasDisponibles'])->middleware(['auth', 'bitacora']);
Route::get('/cuentas/getCuentasByAsociado/{id}', [CuentasController::class, 'getCuentasByAsociado'])->middleware(['auth', 'bitacora']);


//Consultar el saldo de la cuenta
Route::get('cuentas/getcuenta/{id}', [CuentasController::class, 'getCuenta'])->middleware(['auth', 'bitacora']);


/*
Cajas Route
 */
Route::get('/cajas', [CajasController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/cajas/add', [CajasController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/cajas/add', [CajasController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::delete('/cajas/delete', [CajasController::class, 'delete'])->middleware(['auth', 'bitacora']);
Route::get('/cajas/{id}', [CajasController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/cajas/put', [CajasController::class, 'put'])->middleware(['auth', 'bitacora']);
Route::get('/cajas/buscar/{criterio}', [CajasController::class, 'buscar'])->middleware(['auth', 'bitacora']);


/*
Movimientos Route
 */
Route::get('/movimientos', [MovimientosController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/movimientos/depositar/{id}', [MovimientosController::class, 'depositar'])->middleware(['auth', 'bitacora']);
Route::post('/movimientos/realizardeposito', [MovimientosController::class, 'realizardeposito'])->middleware(['auth', 'bitacora']);
Route::get('/movimientos/retirar/{id}', [MovimientosController::class, 'retirar'])->middleware(['auth', 'bitacora']);
Route::post('/movimientos/realizarretiro', [MovimientosController::class, 'realizarretiro'])->middleware(['auth', 'bitacora']);
Route::post('/movimientos/anularmovimiento', [MovimientosController::class, 'anularmovimiento'])->middleware(['auth', 'bitacora']);
Route::get('/movimientos/traslado/{id}', [MovimientosController::class, 'traslado'])->middleware(['auth', 'bitacora']);
Route::post('/movimientos/recibirTraslado', [MovimientosController::class, 'recibirTraslado'])->middleware(['auth', 'bitacora']);
Route::get('/movimientos/getTrasladoPendiente/{id}', [MovimientosController::class, 'getTrasladoPendiente'])->middleware(['auth', 'bitacora']);
Route::get('/movimientos/transferenciabobeda/{id}', [MovimientosController::class, 'transferenciabobeda'])->middleware(['auth', 'bitacora']);
Route::post('/movimientos/realizarTransferenciaBobeda', [MovimientosController::class, 'realizarTransferenciaBobeda'])->middleware(['auth', 'bitacora']);
Route::get('/movimientos/solicitartransferencia/{id}', [MovimientosController::class, 'solicitartransferencia'])->middleware(['auth', 'bitacora']);
// Route::post('/movimientos/realizarSolicitudTransferencia', [MovimientosController::class, 'realizarSolicitudTransferencia'])->middleware(['auth', 'bitacora']);
Route::get('/movimientos/transferenciaTercero/{id}', [MovimientosController::class, 'transferenciaTercero'])->middleware(['auth', 'bitacora']);
Route::post('/movimientos/realizarTransferenciaTerceros', [MovimientosController::class, 'realizarTransferenciaTerceros'])->middleware(['auth', 'bitacora']);


/*
Movimientos Route
 */
Route::get('/boveda', [BobedaController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/boveda/transferir/{id}', [BobedaController::class, 'transferir'])->middleware(['auth', 'bitacora']);
Route::post('/boveda/realizarTraslado', [BobedaController::class, 'realizarTraslado'])->middleware(['auth', 'bitacora']);
Route::post('/boveda/recibirCorte', [BobedaController::class, 'recibirCorte'])->middleware(['auth', 'bitacora']);
Route::get('/boveda/recibir', [BobedaController::class, 'recibirDeCajaABobeda'])->middleware(['auth', 'bitacora']);
Route::post('/boveda/anularTraslado', [BobedaController::class, 'anularTraslado'])->middleware(['auth', 'bitacora']);
Route::get('/boveda/aperturar/{id}', [BobedaController::class, 'aperturarBobeda'])->middleware(['auth', 'bitacora']);
Route::get('/boveda/cerrar/{id}', [BobedaController::class, 'cerrarBobeda'])->middleware(['auth', 'bitacora']);

Route::get('/boveda/getTrasladoPendiente/{id}', [BobedaController::class, 'getTrasladoPendienteCajaABobeda'])->middleware(['auth', 'bitacora']);
Route::post('/boveda/realizarAperturaBobeda', [BobedaController::class, 'realizarAperturaBobeda'])->middleware(['auth', 'bitacora']);
Route::post('/boveda/realizarCierreBobeda', [BobedaController::class, 'realizarCierreBobeda'])->middleware(['auth', 'bitacora']);

Route::post('/boveda/recibirTransferencia', [BobedaController::class, 'recibirTransferenciaDeCaja'])->middleware(['auth', 'bitacora']);
Route::put('/boveda/put', [BobedaController::class, 'put'])->middleware(['auth', 'bitacora']);


/*
Apertura Caja Route
 */
Route::get('/apertura', [AperturaCajaController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/apertura/aperturarcaja', [AperturaCajaController::class, 'aperturar'])->middleware(['auth', 'bitacora']);
Route::post('/apertura/aperturarcaja', [AperturaCajaController::class, 'aperturarcaja'])->middleware(['auth', 'bitacora']);
Route::post('/apertura/recibirTraslado', [AperturaCajaController::class, 'recibirTraslado'])->middleware(['auth', 'bitacora']);
Route::get('/apertura/recibir/{id}', [AperturaCajaController::class, 'recibir'])->middleware(['auth', 'bitacora']);
// Route::put('/apertura/put', [AperturaCajaController::class, 'put'])->middleware(['auth','bitacora']);
Route::get('apertura/gettraslado/{id}', [AperturaCajaController::class, 'gettraslado'])->middleware(['auth', 'bitacora']);
Route::get('apertura/cortez/{id}', [AperturaCajaController::class, 'cortez'])->middleware(['auth', 'bitacora']);


/*
Reporest movimiento Bobeda
*/
Route::get('/reportes/movimientosBobeda/{id}', [ReportesController::class, 'RepMovimientosBobeda'])->middleware(['auth', 'bitacora']);
Route::get('/reportes/comprobante/{id}', [ReportesController::class, 'comprobantesBobeda'])->middleware(['auth', 'bitacora']);
Route::get('/reportes/comprobanteMovimientoBobeda/{id}', [ReportesController::class, 'comprobanteBobeda'])->middleware(['auth', 'bitacora']);

/*
Reportes Movimientos
*/

Route::get('/reportes/comprobanteMovimiento/{id}', [ReportesController::class, 'ComprobanteMovimiento'])->middleware(['auth', 'bitacora']);
// Route::get('/reportes/comprobanteMovimiento/{id}', [ReportesController::class, 'ComprobanteMovimiento'])->middleware(['auth', 'bitacora']);
Route::get('/reportes/RepEstadoCuenta/{id}', [ReportesController::class, 'RepEstadoCuenta'])->middleware(['auth', 'bitacora']);
Route::get('/reportes/contrato/{id}', [ReportesController::class, 'contrato'])->middleware(['auth', 'bitacora']);
Route::get('/reportes/depositoplazo/{id}', [ReportesController::class, 'certificadoDeposito'])->middleware(['auth', 'bitacora']);
Route::get('/creditos/solicitud/{id}', [ReportesController::class, 'solicitudCredito'])->middleware(['auth', 'bitacora']);
Route::get('/creditos/pagare/{id}', [ReportesController::class, 'pagareCredito'])->middleware(['auth', 'bitacora']);

/*
Contraseña temporal para anular operaciones
*/
Route::get('/temp/generateTempPassword', [TempPasswordController::class, 'generateTempPassword'])->middleware(['auth', 'bitacora']);
Route::get('/temp/validatePassword/{password}', [TempPasswordController::class, 'validatePassword'])->middleware(['auth', 'bitacora']);

/*
Modulo
 */
Route::get('/modulo', [ModuloController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/modulo/add', [ModuloController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/modulo/add', [ModuloController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::get('/modulo/{id}', [ModuloController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/modulo/put', [ModuloController::class, 'put'])->middleware(['auth', 'bitacora']);
Route::delete('/modulo/delete', [ModuloController::class, 'delete'])->middleware(['auth', 'bitacora']);

/*
Permisos
 */
Route::get('/permisos', [PermisosController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::post('/allowAccess', [PermisosController::class, 'allowAccess'])->middleware(['auth', 'bitacora']);
Route::post('/getAllowAccess', [PermisosController::class, 'getAccess'])->middleware(['auth', 'bitacora']);


/*
Plazos para depositos
*/
Route::get('/captaciones/plazos', [PlazosController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/captaciones/plazos/add', [PlazosController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/captaciones/plazos/add', [PlazosController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::get('/captaciones/plazos/edit/{id}', [PlazosController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/captaciones/plazos/put', [PlazosController::class, 'put'])->middleware(['auth', 'bitacora']);

/*
Tasas para depositos a plazos
*/
Route::get('/captaciones/tasas/{id}', [TasasPlazosController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/captaciones/tasas/add/{id}', [TasasPlazosController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/captaciones/tasas/add', [TasasPlazosController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::get('/captaciones/tasas/edit/{id}', [TasasPlazosController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/captaciones/tasas/put', [TasasPlazosController::class, 'put'])->middleware(['auth', 'bitacora']);
Route::get('/captaciones/tasas/getTasasByPlazoid/{id}', [TasasPlazosController::class, 'getTasasByPlazoid'])->middleware(['auth', 'bitacora']);
Route::get('/captaciones/tasas/getTasaById/{id}', [TasasPlazosController::class, 'getTasaById'])->middleware(['auth', 'bitacora']);

/*
Depositos Plazo Fijos
*/
Route::get('/captaciones/depositosplazo', [DepositosPlazoController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/captaciones/depositosplazo/add', [DepositosPlazoController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/captaciones/depositosplazo/add', [DepositosPlazoController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::get('/captaciones/depositosplazo/edit/{id}', [DepositosPlazoController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/captaciones/depositosplazo/put', [DepositosPlazoController::class, 'put'])->middleware(['auth', 'bitacora']);
Route::get('/captaciones/depositosplazo/liquidar/{id}', [DepositosPlazoController::class, 'liquidar'])->middleware(['auth', 'bitacora']);
Route::post('/captaciones/depositosplazo/liquidar', [DepositosPlazoController::class, 'liquidarDeposito'])->middleware(['auth', 'bitacora']);
Route::get('/captaciones/depositosplazo/renovar/{id}', [DepositosPlazoController::class, 'renovar'])->middleware(['auth', 'bitacora']);

/*
Beneficiarios Depositos Plazo Fijos
*/

Route::get('/captaciones/depositosplazo/{id}/beneficiarios', [BeneficiarosDepositosController::class, 'indexBeneficiarios'])->middleware(['auth', 'bitacora']);
Route::get('/captaciones/beneficiarios/add/{id_deposito}', [BeneficiarosDepositosController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/captaciones/beneficiarios/add', [BeneficiarosDepositosController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::get('/captaciones/beneficiarios/edit/{id}', [BeneficiarosDepositosController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/captaciones/beneficiarios/put', [BeneficiarosDepositosController::class, 'put'])->middleware(['auth', 'bitacora']);
Route::delete('/captaciones/beneficiarios/delete', [BeneficiarosDepositosController::class, 'delete'])->middleware(['auth', 'bitacora']);

/*
Creditos
*/

Route::get('/creditos/solicitudes', [SolicitudCreditoController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/creditos/solicitudes/add', [SolicitudCreditoController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/creditos/solicitudes/add', [SolicitudCreditoController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::get('/creditos/solicitudes/edit/{id}', [SolicitudCreditoController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/creditos/solicitudes/put', [SolicitudCreditoController::class, 'put'])->middleware(['auth', 'bitacora']);
Route::delete('/creditos/solicitudes/delete', [SolicitudCreditoController::class, 'delete'])->middleware(['auth', 'bitacora']);

/*
Referencias Solicitud Creditos

*/
Route::get('/creditos/solicitudes/referencias/add/{id_referencia}/{id_solicitud}', [ReferenciaSolicitudController::class, 'addReferencia'])->middleware(['auth', 'bitacora']);
Route::get('/creditos/solicitudes/referencias/quitar/{id}', [ReferenciaSolicitudController::class, 'quitar'])->middleware(['auth', 'bitacora']);
Route::get('/creditos/solicitudes/referencias/getReferencias/{id}', [ReferenciaSolicitudController::class, 'getReferencias'])->middleware(['auth', 'bitacora']);

/*Desembolso*/

/*Estudios pre aprobados*/
Route::get('/creditos/solicitudes/estudios', [CreditoController::class, 'estudios'])->middleware(['auth', 'bitacora']);
Route::post('/creditos/solicitudes/estudios', [CreditoController::class, 'estudios'])->middleware(['auth', 'bitacora']);
// Route::post('/creditos/solicitudes/estudios', [CreditoController::class, 'estudios'])->middleware(['auth', 'bitacora']);

Route::get('/creditos/preaprobado/liquidar/{id}', [CreditoController::class, 'liquidar'])->middleware(['auth', 'bitacora']);
Route::post('/creditos/preaprobado/liquidar/add-descuento', [LiquidacionController::class, 'addDescuentoDesembolso'])->middleware(['auth', 'bitacora']);
Route::get('/creditos/preaprobado/liquidar/getDescuentos/{id}', [LiquidacionController::class, 'getDescuentos'])->middleware(['auth', 'bitacora']);
Route::get('/creditos/preaprobado/liquidar/quitarDescuento/{id}', [LiquidacionController::class, 'deleteDescuento'])->middleware(['auth', 'bitacora']);
Route::get('/creditos/aprobado/liquidacion/{id}', [ReportesController::class, 'liquidacionPrint'])->middleware(['auth', 'bitacora']);



Route::get('/creditos/solicitudes/desembolso/{id}', [SolicitudCreditoController::class, 'desembolso'])->middleware(['auth', 'bitacora']);
Route::post('/creditos/solicitudes/create-credit', [SolicitudCreditoController::class, 'createCredit'])->middleware(['auth', 'bitacora']);
Route::post('/creditos/solicitudes/liquidar', [SolicitudCreditoController::class, 'liquidar'])->middleware(['auth', 'bitacora']);

/*
Bienes Solicitud Credito
*/
Route::post('/creditos/solicitudes/bienes/add', [SolicitudCreditoBienesController::class, 'addBien'])->middleware(['auth', 'bitacora']);
Route::get('/creditos/solicitudes/bienes/quitar/{id}', [SolicitudCreditoBienesController::class, 'quitar'])->middleware(['auth', 'bitacora']);
Route::get('/creditos/solicitudes/bienes/getBienes/{id}', [SolicitudCreditoBienesController::class, 'getBienes'])->middleware(['auth', 'bitacora']);


/*
Contabilidad
*/

Route::get('/creditos/abonos', [CreditoController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::post('/creditos/abonos', [CreditoController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/creditos/payment/{id}', [CreditoController::class, 'payment'])->middleware(['auth', 'bitacora']);
Route::post('/creditos/payment', [CreditoController::class, 'payCredit'])->middleware(['auth', 'bitacora']);
Route::get('/reportes/comprobanteAbono/{id}', [ReportesController::class, 'comprobanteAbono'])->middleware(['auth', 'bitacora']);

/*Tipo cuentas contables*/
/*catalogo*/
Route::get('/contabilidad/tipocuentacontable', [TipoCuentaCotableController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::post('/contabilidad/tipocuentacontable', [TipoCuentaCotableController::class, 'index'])->middleware(['auth', 'bitacora']);

Route::get('/contabilidad/tipocuentacontable/add', [TipoCuentaCotableController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/contabilidad/tipocuentacontable/add', [TipoCuentaCotableController::class, 'post'])->middleware(['auth', 'bitacora']);

Route::get('/contabilidad/tipocuentacontable/edit/{id}', [TipoCuentaCotableController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/contabilidad/tipocuentacontable/put', [TipoCuentaCotableController::class, 'put'])->middleware(['auth', 'bitacora']);
Route::delete('/contabilidad/tipocuentacontable/delete', [TipoCuentaCotableController::class, 'delete'])->middleware(['auth', 'bitacora']);


/*catalogo cuentas contables*/
Route::get('/contabilidad/catalogo', [CatalogoController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::post('/contabilidad/catalogo', [CatalogoController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/contabilidad/catalogo/add', [CatalogoController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::get('/contabilidad/catalogo/getCuentasById/{id}', [CatalogoController::class, 'getCuentasById'])->middleware(['auth', 'bitacora']);

Route::post('/contabilidad/catalogo/add', [CatalogoController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::get('/contabilidad/catalogo/edit/{id}', [CatalogoController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/contabilidad/catalogo/put', [CatalogoController::class, 'put'])->middleware(['auth', 'bitacora']);
Route::delete('/contabilidad/catalogo/delete', [CatalogoController::class, 'delete'])->middleware(['auth', 'bitacora']);


/*Tipos Partidas Contables */
Route::get('/contabilidad/tipos-partidas', [TiposPartidasContablesController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::post('/contabilidad/tipos-partidas', [TiposPartidasContablesController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/contabilidad/tipos-partidas/add', [TiposPartidasContablesController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/contabilidad/tipos-partidas/add', [TiposPartidasContablesController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::get('/contabilidad/tipos-partidas/edit/{id}', [TiposPartidasContablesController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::put('/contabilidad/tipos-partidas/put', [TiposPartidasContablesController::class, 'put'])->middleware(['auth', 'bitacora']);
Route::delete('/contabilidad/tipos-partidas/delete', [TiposPartidasContablesController::class, 'delete'])->middleware(['auth', 'bitacora']);


/*Partidas Contables */
Route::get('/contabilidad/partidas', [PartidasContablesController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::post('/contabilidad/partidas', [PartidasContablesController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/contabilidad/partidas/add', [PartidasContablesController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::get('/contabilidad/partidas/edit/{id}', [PartidasContablesController::class, 'edit'])->middleware(['auth', 'bitacora']);
Route::post('/contabilidad/partidas/put', [PartidasContablesController::class, 'put'])->middleware(['auth', 'bitacora']);
/**Reporte partidas contables */
Route::get('/reportes/partidaContable/{id}', [ReportesController::class, 'partidaContable'])->middleware(['auth', 'bitacora']);



/**Detalles partida contable */
Route::post('/contabilidad/partidas-detalle/add', [PartidaContableDetalleController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::get('/contabilidad/partidas-detalle/getPartidaDetalles/{id}', [PartidaContableDetalleController::class, 'getPartidaDetalles'])->middleware(['auth', 'bitacora']);
Route::get('/contabilidad/partidas-detalle/delete/{id}', [PartidaContableDetalleController::class, 'delete'])->middleware(['auth', 'bitacora']);






/** rutas de declaraciones*/
Route::middleware(['auth', 'bitacora'])->prefix('declare')->group(function () {
    Route::get('/{acc}/new', [DeclaracionJuradaController::class, 'create']);
    Route::post('/add', [DeclaracionJuradaController::class, 'store'])->name('store-declare');
    Route::get('/{acc}', [DeclaracionJuradaController::class, 'edit'])->name('edit-declare');
    Route::post('/update', [DeclaracionJuradaController::class, 'update'])->name('update-declare');
    Route::get('/{acc}/pdf', [DeclaracionJuradaController::class, 'pdf']);
});
/* rutas de alerts*/
Route::middleware(['auth', 'bitacora'])->prefix('alerts')->group(function () {
    Route::get('', [MoneylaunderingController::class, 'index']);
    Route::post('new', [MoneylaunderingController::class, 'store']);
});
/* rutas de alerts*/
Route::middleware(['auth', 'bitacora'])->prefix('params')->group(function () {
    Route::get('', [ParameterController::class, 'index']);
    Route::get('/edit', [ParameterController::class, 'edit']);
    Route::post('/update', [ParameterController::class, 'update']);
});
