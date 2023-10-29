<?php

use App\Http\Controllers\AperturaCajaController;
use App\Http\Controllers\BeneficiarosDepositosController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\BobedaController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\CierreMensualController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\CorrelativosController;
use App\Http\Controllers\DepositosPlazoController;
use App\Http\Controllers\IvaController;
use App\Http\Controllers\librosContableController;
use App\Http\Controllers\LiquidacionController;
use App\Http\Controllers\PartidaContableDetalleController;
use App\Http\Controllers\PartidasContablesController;
use App\Http\Controllers\PlazosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ReferenciaSolicitudController;
use App\Http\Controllers\ReporteContabilidad;
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
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\LibretasController;

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
Route::get('/clientes/list', [ClientesController::class, 'getClientes'])->middleware(['auth'])->name('clientes.list');
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

Route::middleware(['auth', 'bitacora'])->prefix('cuentas')->group(function () {
    Route::get('/', [CuentasController::class, 'index']);
    Route::get('/add', [CuentasController::class, 'add']);
    Route::get('/addcuentacompartida', [CuentasController::class, 'addcuentacompartida']);
    Route::post('/add', [CuentasController::class, 'post']);
    Route::post('/anularCuenta', [CuentasController::class, 'anularCuenta']);
    Route::get('/{id}', [CuentasController::class, 'edit']);
    Route::put('/put', [CuentasController::class, 'put']);
    Route::get('/getCuentasDisponibles/{id}', [CuentasController::class, 'getCuentasDisponibles']);
    Route::get('/getCuentasByAsociado/{id}', [CuentasController::class, 'getCuentasByAsociado']);
    Route::get('/listarMovimientosSinImprirmir/{id_cuenta}', [CuentasController::class, 'getMovimientosSinImprimir']);
    Route::get('/getLibreta/{id_cuenta}', [CuentasController::class,'getLibreta']);
});

/*Libretas */

Route::post('/libretas/imprimirLibretaItems',[LibretasController::class,'imprimirMovimientos']);

Route::middleware(['auth','bitacora'])->prefix('libretas')->group(function () {
    Route::get('/', [LibretasController::class,'index']);

});


//Consultar el saldo de la cuenta
Route::get('cuentas/getcuenta/{id}', [CuentasController::class, 'getCuenta'])->middleware(['auth', 'bitacora']);


/*
Cajas Route
 */
Route::middleware(['auth', 'bitacora'])->prefix('cajas')->group(function () {
    Route::get('/', [CajasController::class, 'index']);
    Route::get('/add', [CajasController::class, 'add']);
    Route::post('/add', [CajasController::class, 'post']);
    Route::delete('/delete', [CajasController::class, 'delete']);
    Route::get('/edit/{id}', [CajasController::class, 'edit']);
    Route::put('/put', [CajasController::class, 'put']);
    Route::get('/buscar/{criterio}', [CajasController::class, 'buscar']);
});

Route::middleware(['auth', 'bitacora'])->prefix('correlativos')->group(function () {
    Route::get('/caja/{id}/list', [CorrelativosController::class, 'index']);
    Route::get('/caja/{id}/add', [CorrelativosController::class, 'add']);
    Route::post('/caja/add', [CorrelativosController::class, 'post']);
    Route::get('/caja/edit-correlativo/{id_correlativo}', [CorrelativosController::class, 'edit']);
    Route::put('/caja/edit-correlativo/put', [CorrelativosController::class, 'put']);
    Route::get('/getNumDocumento/{tipoDocumento}', [CorrelativosController::class, 'getNumFactura']);
});



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
Route::delete('/captaciones/depositosplazo/delete', [DepositosPlazoController::class, 'delete'])->middleware(['auth', 'bitacora']);
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
Route::put('/creditos/solicitudes/rechazar', [SolicitudCreditoController::class, 'rechazar'])->middleware(['auth', 'bitacora']);



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



Route::get('/creditos/solicitudes/send_comite/{id}', [SolicitudCreditoController::class, 'enviar_comite'])->middleware(['auth', 'bitacora']);
Route::get('/creditos/solicitudes/desembolso/{id}', [SolicitudCreditoController::class, 'desembolso'])->middleware(['auth', 'bitacora']);

Route::get('/comite', [SolicitudCreditoController::class, 'solicitud_comite'])->middleware(['auth', 'bitacora']);

Route::post('/creditos/solicitudes/create-credit', [SolicitudCreditoController::class, 'createCredit'])->middleware(['auth', 'bitacora']);
Route::post('/creditos/solicitudes/send_comite', [SolicitudCreditoController::class, 'comite'])->middleware(['auth', 'bitacora']);

Route::post('/creditos/solicitudes/liquidar', [SolicitudCreditoController::class, 'liquidar'])->middleware(['auth', 'bitacora']);

Route::get('/reportes/desembolsos', [CreditoController::class, 'desembolsosReporte'])->middleware(['auth', 'bitacora']);
Route::post('/reportes/desembolsos', [CreditoController::class, 'desembolsosReporte'])->middleware(['auth', 'bitacora']);

Route::get('/creditos/desembolsos/reportes/{desde}/{hasta}', [CreditoController::class, 'desembolsosRep'])->middleware(['auth', 'bitacora']);

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
Route::get('/contabilidad/reportes', [ReporteContabilidad::class, 'index'])->middleware(['auth', 'bitacora']);
/**Reporte partidas contables */
Route::get('/reportes/partidaContable/{id}', [ReportesController::class, 'partidaContable'])->middleware(['auth', 'bitacora']);



/**Detalles partida contable */
Route::post('/contabilidad/partidas-detalle/add', [PartidaContableDetalleController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::get('/contabilidad/partidas-detalle/getPartidaDetalles/{id}', [PartidaContableDetalleController::class, 'getPartidaDetalles'])->middleware(['auth', 'bitacora']);
Route::get('/contabilidad/partidas-detalle/delete/{id}', [PartidaContableDetalleController::class, 'delete'])->middleware(['auth', 'bitacora']);


/**Cierre contable - Mensual */
Route::get('/contabilidad/cierre-mensual', [CierreMensualController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::post('/contabilidad/cierre-mensual', [CierreMensualController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/contabilidad/cierre-mensual/cierre', [CierreMensualController::class, 'add'])->middleware(['auth', 'bitacora']);
Route::post('/contabilidad/cierre-mensual/cierre', [CierreMensualController::class, 'post'])->middleware(['auth', 'bitacora']);
Route::get('/contabilidad/cierre-mensual/revertir/{id}', [CierreMensualController::class, 'revertir'])->middleware(['auth', 'bitacora']);
Route::get('/contabilidad/cierre-mensual/imprimir/{id}', [CierreMensualController::class, 'imprimir'])->middleware(['auth', 'bitacora']);
Route::delete('/contabilidad/cierre-mensual/revertir', [CierreMensualController::class, 'revertirCierre'])->middleware(['auth', 'bitacora']);
/* /Cierre Contable*/



/*Reportes Contables*/
Route::get('/contabilidad/Reportes/catalogodecuentas', [ReportesController::class, 'catalogoCuentas'])->middleware(['auth', 'bitacora']);

Route::get('/contabilidad/Reportes/historicodecuenta', [ReporteContabilidad::class, 'historicoCuenta'])->middleware(['auth', 'bitacora']);
Route::post('/contabilidad/Reportes/historicodecuenta', [ReporteContabilidad::class, 'historicoCuenta_reporte'])->middleware(['auth', 'bitacora']);

Route::get('/contabilidad/Reportes/libroauxiliar', [librosContableController::class, 'libroAuxiliar'])->middleware(['auth', 'bitacora']);
Route::post('/contabilidad/Reportes/libroauxiliar', [librosContableController::class, 'libroAuxiliarRep'])->middleware(['auth', 'bitacora']);

Route::get('/contabilidad/Reportes/libromayor', [librosContableController::class, 'libroMayor'])->middleware(['auth', 'bitacora']);
Route::post('/contabilidad/Reportes/libromayor', [librosContableController::class, 'libroMayorRep'])->middleware(['auth', 'bitacora']);
Route::get('/contabilidad/Reportes/librodiario', [librosContableController::class, 'libroDiario'])->middleware(['auth', 'bitacora']);
Route::post('/contabilidad/Reporte/librodiario', [librosContableController::class, 'libroDiarioGeneralRep'])->middleware(['auth', 'bitacora']);

/**ESTADO DE RESULTADO */

Route::get('/contabilidad/Reportes/estadoresultado', [ReporteContabilidad::class, 'estadoResultado'])->middleware(['auth', 'bitacora']);
Route::post('/contabilidad/Reporte/estadoresultado', [ReporteContabilidad::class, 'estadoResultadoRep'])->middleware(['auth', 'bitacora']);

Route::get('/contabilidad/Reportes/estadoresultadoMetodo/{fechaInicio}/{fechaFin}', [ReporteContabilidad::class, 'estadoResultadoMetodo'])->middleware(['auth', 'bitacora']);

/**BALACNE GENERAL */
Route::get('/contabilidad/Reportes/balancegeneral', [ReporteContabilidad::class, 'balanceGeneral'])->middleware(['auth', 'bitacora']);
Route::post('/contabilidad/Reporte/balancegeneral', [ReporteContabilidad::class, 'balanceGeneralRep'])->middleware(['auth', 'bitacora']);

// balance de comprobacion
Route::get('/contabilidad/Reportes/balancecomprobacion', [ReporteContabilidad::class, 'balancecomprobacion'])->middleware(['auth', 'bitacora']);
Route::post('/contabilidad/Reporte/balancecomprobacion', [ReporteContabilidad::class, 'balancecomprobacionRep'])->middleware(['auth', 'bitacora']);

Route::get('/contabilidad/Reportes/partidasdediario', [ReporteContabilidad::class, 'libroDiarioUni'])->middleware(['auth', 'bitacora']);
Route::post('/contabilidad/Reporte/partidasdediario', [ReporteContabilidad::class, 'libroDiarioUniRep'])->middleware(['auth', 'bitacora']);

/*Bitacora */
Route::get('/bitacora', [BitacoraController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::post('/bitacora', [BitacoraController::class, 'index'])->middleware(['auth', 'bitacora']);
Route::get('/bitacora/reporte/{desde}/{hasta}', [BitacoraController::class, 'reporte'])->middleware(['auth', 'bitacora']);




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
    Route::get('clients', [MoneylaunderingController::class, 'clientsReport']);
    Route::get('client/{id}', [MoneylaunderingController::class, 'clientReport']);
    Route::get('active', [MoneylaunderingController::class, 'activeReport']);
    Route::get('emp', [MoneylaunderingController::class, 'empReport']);
});
/* rutas de alerts*/
Route::middleware(['auth', 'bitacora'])->prefix('params')->group(function () {
    Route::get('', [ParameterController::class, 'index']);
    Route::get('/edit', [ParameterController::class, 'edit']);
    Route::post('/update', [ParameterController::class, 'update']);
});
// reportes de creditos
Route::middleware(['auth', 'bitacora'])->prefix('reportes')->group(function () {
    // reported creditos pagados
    Route::get('/creditos', [CreditoController::class, 'cred_canc']);
    Route::post('/creditos', [CreditoController::class, 'cred_canc_search']);
    Route::get('/creditos/{desde}/{hasta}', [CreditoController::class, 'cred_canc_rep']);
    // reportes cartera en mora
    Route::get('/cartera-mora', [CreditoController::class, 'cartera_mora']);
    Route::get('/cartera-mora-rep', [CreditoController::class, 'cartera_mora_rep']);
    //Cartera activa
    Route::get('/cartera', [CreditoController::class, 'cartera_activa']);
    Route::get('/cartera-activa', [CreditoController::class, 'cartera_activa_rep']);
    Route::get('/cuentas-activa', [CreditoController::class, 'cuenta_activa_rep']);
    //Ingresos
    Route::get('/ingresos', [MovimientosController::class, 'ingresos']);
    Route::post('/ingresos', [MovimientosController::class, 'ingresos']);
    Route::get('/ingresos/{desde}/{hasta}', [MovimientosController::class, 'ingresos_rep']);
    // reports creditos prox a vencer
    Route::get('creditos/proximos-vencer', [CreditoController::class, 'prox_vencer']);
    Route::get('creditos/proximos-vencer-rep', [CreditoController::class, 'prox_vencer_rep']);
});

Route::middleware(['auth', 'bitacora'])->prefix('proveedores')->group(function () {

    Route::get('/list', [ProveedoresController::class, 'index']);
    Route::post('/list', [ProveedoresController::class, 'index']);
    Route::get('/add', [ProveedoresController::class, 'add']);
    Route::post('/add', [ProveedoresController::class, 'post']);
    Route::get('/edit/{id}', [ProveedoresController::class, 'edit']);
    Route::put('/put', [ProveedoresController::class, 'put']);
    Route::delete('/delete', [ProveedoresController::class, 'delete']);
    Route::get('/reporte/{filtro}', [ProveedoresController::class, 'reporte']);
});


Route::middleware(['auth', 'bitacora'])->prefix('productos')->group(function () {
    Route::get('/list', [ProductosController::class, 'index']);
    Route::post('/list', [ProductosController::class, 'index']);
    Route::get('/add', [ProductosController::class, 'add']);
    Route::post('/add', [ProductosController::class, 'post']);
    Route::get('/edit/{id}', [ProductosController::class, 'edit']);
    Route::put('/put', [ProductosController::class, 'put']);
    Route::get('/reporte/{filtro}', [ProductosController::class, 'reporte']);
    Route::delete('/delete', [ProductosController::class, 'delete']);
});

Route::middleware(['auth', 'bitacora'])->prefix('compras')->group(function () {
    Route::get('/list', [ComprasController::class, 'index']);
    Route::post('/list', [ComprasController::class, 'index']);
    Route::get('/add', [ComprasController::class, 'add']);
    Route::post('/add-product', [ComprasController::class, 'addProduct']);
    Route::get('/edit/{id}', [ComprasController::class, 'edit']);
    //Eliminar Producto
    Route::get('/delete-product/{id}', [ComprasController::class, 'deleteProduct']);
    //Eliminar Compra
    Route::delete('/delete', [ComprasController::class, 'delete']);
    Route::get('/detalles/{id_compra}', [ComprasController::class, 'getDetalles']);
    Route::post('/finalizar', [ComprasController::class, 'finalizar']);
    Route::get('/reporte/{filtro}', [ComprasController::class, 'reporte']);
    Route::post('/percepcion', [ComprasController::class, 'percepcion']);
});

Route::middleware(['auth', 'bitacora'])->prefix('facturas')->group(function () {
    Route::get('/list', [FacturasController::class, 'index']);
    Route::post('/list', [FacturasController::class, 'index']);
    Route::get('/add', [FacturasController::class, 'add']);
    Route::post('/add-product', [FacturasController::class, 'addProduct']);
    Route::get('/edit/{id}', [FacturasController::class, 'edit']);
    Route::get('/delete-product/{id}', [FacturasController::class, 'deleteProduct']);
    Route::delete('/delete', [FacturasController::class, 'delete']);
    Route::get('/detalles/{id_compra}', [FacturasController::class, 'getDetalles']);
    Route::post('/finalizar', [FacturasController::class, 'finalizar']);
    Route::get('/reporte/{filtro}', [FacturasController::class, 'reporte']);
    Route::post('/percepcion', [FacturasController::class, 'percepcion']);
});

Route::middleware(['auth', 'bitacora'])->prefix('iva')->group(function () {
    Route::get('/compras', [IvaController::class, 'libroCompra']);
    Route::post('/compras', [IvaController::class, 'libroCompra_rep']);
    //ventas al consumidor
    Route::get('/facturas-consumidor', [IvaController::class, 'libroFacturasConsumidor']);
    Route::post('/facturas-consumidor', [IvaController::class, 'libroFacturasConsumidor_rep']);
    //ventas al CCF
    Route::get('/facturas-contribuyente', [IvaController::class, 'libroFacturasCCF']);
    Route::post('/facturas-contribuyente', [IvaController::class, 'libroFacturasCCF_rep']);


});

Route::get('/contabilidad/Reportes/infored', [ReportesController::class, 'infored'])->middleware(['auth', 'bitacora']);
Route::get('/contabilidad/Reportes/infored_rep', [ReportesController::class, 'inforedExport'])->middleware(['auth', 'bitacora']);
