<?php

use App\Http\Controllers\AperturaCajaController;
use App\Http\Controllers\BobedaController;
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
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');


Route::get('/login',[LoginController::class, 'index'])->name("login");
Route::post('/login',[LoginController::class, 'login']);
Route::get('/reset-password',[LoginController::class, 'recoveryPassword']);
Route::post('/send-password',[LoginController::class, 'sendEmailRecoveryPassword']);
Route::get('/set-new-password',[LoginController::class, 'setNewPassword'])->middleware(['auth','bitacora']);
Route::post('/set-new-password',[LoginController::class, 'setPassword'])->middleware(['auth','bitacora']);


/*
Dashboard Route
 */
 Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth','bitacora']);

 
/*
User Route
 */
Route::get('/user',[UserController::class, 'index'])->middleware(['auth','bitacora']);
Route::get('/user/add',[UserController::class, 'add'])->middleware(['auth','bitacora']);
Route::post('/user/add',[UserController::class, 'post'])->middleware(['auth','bitacora']);
Route::delete('/user/delete',[UserController::class, 'delete'])->middleware(['auth','bitacora']);
Route::get('/user/{id}',[UserController::class, 'edit'])->middleware(['auth','bitacora']);
Route::put('/user/put',[UserController::class, 'put'])->middleware(['auth','bitacora']);


/*
Rol Route
 */
Route::get('/rol',[RolController::class, 'index'])->middleware(['auth','bitacora']);
Route::get('/rol/add',[RolController::class, 'add'])->middleware(['auth','bitacora']);
Route::post('/rol/add',[RolController::class, 'post'])->middleware(['auth','bitacora']);
Route::delete('/rol/delete',[RolController::class, 'delete'])->middleware(['auth','bitacora']);
Route::get('/rol/{id}',[RolController::class, 'edit'])->middleware(['auth','bitacora']);
Route::put('/rol/put',[RolController::class, 'put'])->middleware(['auth','bitacora']);

/*
TiposCuentas Route
 */
Route::get('/tipoCuenta', [TipoCuentaController::class, 'index'])->middleware(['auth','bitacora']);
Route::get('/tipoCuenta/add', [TipoCuentaController::class, 'add'])->middleware(['auth','bitacora']);
Route::post('/tipoCuenta/add', [TipoCuentaController::class, 'post'])->middleware(['auth','bitacora']);
Route::delete('/tipoCuenta/delete', [TipoCuentaController::class, 'delete'])->middleware(['auth','bitacora']);
Route::get('/tipoCuenta/{id}', [TipoCuentaController::class, 'edit'])->middleware(['auth','bitacora']);
Route::put('/tipoCuenta/put', [TipoCuentaController::class, 'put'])->middleware(['auth','bitacora']);

/*
Empleados Route
 */
Route::get('/empleados', [EmpleadoController::class, 'index'])->middleware(['auth','bitacora']);
Route::get('/empleados/add', [EmpleadoController::class, 'add'])->middleware(['auth','bitacora']);
Route::post('/empleados/add', [EmpleadoController::class, 'post'])->middleware(['auth','bitacora']);
Route::delete('/empleados/delete', [EmpleadoController::class, 'delete'])->middleware(['auth','bitacora']);
Route::get('/empleados/{id}', [EmpleadoController::class, 'edit'])->middleware(['auth','bitacora']);
Route::put('/empleados/put', [EmpleadoController::class, 'put'])->middleware(['auth','bitacora']);

/*
Clientes Route
 */
Route::get('/clientes', [ClientesController::class, 'index'])->middleware(['auth','bitacora']);
Route::get('/clientes/add', [ClientesController::class, 'add'])->middleware(['auth','bitacora']);
Route::post('/clientes/add', [ClientesController::class, 'post'])->middleware(['auth','bitacora']);
Route::delete('/clientes/delete', [ClientesController::class, 'delete'])->middleware(['auth','bitacora']);
Route::get('/clientes/{id}', [ClientesController::class, 'edit'])->middleware(['auth','bitacora']);
Route::put('/clientes/put', [ClientesController::class, 'put'])->middleware(['auth','bitacora']);

/*
Referencias Route
 */
Route::get('/referencias', [ReferenciasController::class, 'index'])->middleware(['auth','bitacora']);
Route::get('/referencias/add', [ReferenciasController::class, 'add'])->middleware(['auth','bitacora']);
Route::post('/referencias/add', [ReferenciasController::class, 'post'])->middleware(['auth','bitacora']);
Route::delete('/referencias/delete', [ReferenciasController::class, 'delete'])->middleware(['auth','bitacora']);
Route::get('/referencias/{id}', [ReferenciasController::class, 'edit'])->middleware(['auth','bitacora']);
Route::put('/referencias/put', [ReferenciasController::class, 'put'])->middleware(['auth','bitacora']);


/*
Asociados Route
 */
Route::get('/asociados', [AsociadosController::class, 'index'])->middleware(['auth','bitacora']);
Route::get('/asociados/add', [AsociadosController::class, 'add'])->middleware(['auth','bitacora']);
Route::post('/asociados/add', [AsociadosController::class, 'post'])->middleware(['auth','bitacora']);
Route::delete('/asociados/delete', [AsociadosController::class, 'delete'])->middleware(['auth','bitacora']);
Route::get('/asociados/{id}', [AsociadosController::class, 'edit'])->middleware(['auth','bitacora']);
Route::put('/asociados/put', [AsociadosController::class, 'put'])->middleware(['auth','bitacora']);

/*
Beneficiarios Route
 */
Route::get('/beneficiarios/{id_asociado?}', [BeneficiariosController::class, 'index'])->middleware(['auth','bitacora']);
Route::get('/beneficiarios/add/{id}', [BeneficiariosController::class, 'add'])->middleware(['auth','bitacora']);
Route::post('/beneficiarios/add', [BeneficiariosController::class, 'post'])->middleware(['auth','bitacora']);
Route::delete('/beneficiarios/delete', [BeneficiariosController::class, 'delete'])->middleware(['auth','bitacora']);
Route::get('/beneficiarios/edit/{id_registro}', [BeneficiariosController::class, 'edit'])->middleware(['auth','bitacora']);
Route::put('/beneficiarios/put', [BeneficiariosController::class, 'put'])->middleware(['auth','bitacora']);

/*
Interes tipos cuenta Route
 */
Route::get('/intereses/{id_asociado?}', [InteresesTipoCuentaController::class, 'index'])->middleware(['auth','bitacora']);
Route::get('/intereses/add/{id}', [InteresesTipoCuentaController::class, 'add'])->middleware(['auth','bitacora']);
Route::post('/intereses/add', [InteresesTipoCuentaController::class, 'post'])->middleware(['auth','bitacora']);
Route::delete('/intereses/delete', [InteresesTipoCuentaController::class, 'delete'])->middleware(['auth','bitacora']);
Route::get('/intereses/edit/{id_registro}', [InteresesTipoCuentaController::class, 'edit'])->middleware(['auth','bitacora']);
Route::put('/intereses/put', [InteresesTipoCuentaController::class, 'put'])->middleware(['auth','bitacora']);
//Ruta para cargar los datos al cambiar el tipo de cuenta
Route::get('intereses/getIntereses/{id}', [InteresesTipoCuentaController::class, 'getIntereses'])->middleware(['auth','bitacora']);



/*
Cuentas Route
 */
Route::get('/cuentas', [CuentasController::class, 'index'])->middleware(['auth','bitacora']);
Route::get('/cuentas/add', [CuentasController::class, 'add'])->middleware(['auth','bitacora']);
Route::post('/cuentas/add', [CuentasController::class, 'post'])->middleware(['auth','bitacora']);
Route::delete('/cuentas/delete', [CuentasController::class, 'delete'])->middleware(['auth','bitacora']);
Route::get('/cuentas/{id}', [CuentasController::class, 'edit'])->middleware(['auth','bitacora']);
Route::put('/cuentas/put', [CuentasController::class, 'put'])->middleware(['auth','bitacora']);
//Consultar el saldo de la cuenta
Route::get('cuentas/getcuenta/{id}', [CuentasController::class, 'getCuenta'])->middleware(['auth','bitacora']);


/*
Cajas Route
 */
Route::get('/cajas', [CajasController::class, 'index'])->middleware(['auth','bitacora']);
Route::get('/cajas/add', [CajasController::class, 'add'])->middleware(['auth','bitacora']);
Route::post('/cajas/add', [CajasController::class, 'post'])->middleware(['auth','bitacora']);
Route::delete('/cajas/delete', [CajasController::class, 'delete'])->middleware(['auth','bitacora']);
Route::get('/cajas/{id}', [CajasController::class, 'edit'])->middleware(['auth','bitacora']);
Route::put('/cajas/put', [CajasController::class, 'put'])->middleware(['auth','bitacora']);


/*
Movimientos Route
 */
Route::get('/movimientos', [MovimientosController::class, 'index'])->middleware(['auth','bitacora']);
Route::get('/movimientos/depositar/{id}', [MovimientosController::class, 'depositar'])->middleware(['auth','bitacora']);
Route::post('/movimientos/realizardeposito', [MovimientosController::class, 'realizardeposito'])->middleware(['auth','bitacora']);
Route::get('/movimientos/retirar/{id}', [MovimientosController::class, 'retirar'])->middleware(['auth','bitacora']);
Route::post('/movimientos/realizarretiro', [MovimientosController::class, 'realizarretiro'])->middleware(['auth','bitacora']);
Route::put('/movimientos/put', [MovimientosController::class, 'put'])->middleware(['auth','bitacora']);
Route::post('/movimientos/anularmovimiento', [MovimientosController::class, 'anularmovimiento'])->middleware(['auth','bitacora']);
Route::get('/movimientos/traslado/{id}', [MovimientosController::class, 'traslado'])->middleware(['auth','bitacora']);
Route::post('/movimientos/recibirTraslado', [MovimientosController::class, 'recibirTraslado'])->middleware(['auth','bitacora']);
Route::get('/movimientos/getTrasladoPendiente/{id}', [MovimientosController::class, 'getTrasladoPendiente'])->middleware(['auth','bitacora']);




/*
Movimientos Route
 */
Route::get('/bobeda', [BobedaController::class, 'index'])->middleware(['auth','bitacora']);
Route::get('/bobeda/transferir/{id}', [BobedaController::class, 'transferir'])->middleware(['auth','bitacora']);
Route::post('/bobeda/realizarTraslado', [BobedaController::class, 'realizarTraslado'])->middleware(['auth','bitacora']);
Route::post('/bobeda/recibirTraslado', [BobedaController::class, 'recibirTraslado'])->middleware(['auth','bitacora']);
Route::get('/bobeda/recibir/{id}', [BobedaController::class, 'recibir'])->middleware(['auth','bitacora']);
Route::post('/bobeda/anularTraslado', [BobedaController::class, 'anularTraslado'])->middleware(['auth','bitacora']);
Route::get('/bobeda/aperturar/{id}', [BobedaController::class, 'aperturarBobeda'])->middleware(['auth','bitacora']);
Route::post('/bobeda/realizarAperturaBobeda', [BobedaController::class, 'realizarAperturaBobeda'])->middleware(['auth','bitacora']);



Route::put('/bobeda/put', [BobedaController::class, 'put'])->middleware(['auth','bitacora']);



/*
Apertura Caja Route
 */
Route::get('/apertura', [AperturaCajaController::class, 'index'])->middleware(['auth','bitacora']);
Route::get('/apertura/aperturarcaja', [AperturaCajaController::class, 'aperturar'])->middleware(['auth','bitacora']);
Route::post('/apertura/aperturarcaja', [AperturaCajaController::class, 'aperturarcaja'])->middleware(['auth','bitacora']);
Route::post('/apertura/recibirTraslado', [AperturaCajaController::class, 'recibirTraslado'])->middleware(['auth','bitacora']);
Route::get('/apertura/recibir/{id}', [AperturaCajaController::class, 'recibir'])->middleware(['auth','bitacora']);
Route::put('/apertura/put', [AperturaCajaController::class, 'put'])->middleware(['auth','bitacora']);
Route::get('apertura/gettraslado/{id}', [AperturaCajaController::class, 'gettraslado'])->middleware(['auth','bitacora']);

/*
Reporest Route
*/
Route::get('/reportes/test',[ReportesController::class,'index'])->middleware(['auth','bitacora']);
Route::get('/reportes/movimientosBobeda/{id}', [ReportesController::class, 'movimientosBobeda'])->middleware(['auth','bitacora']);