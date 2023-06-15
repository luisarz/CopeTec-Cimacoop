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


/*
Dashboard Route
 */
 Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('auth');

 
/*
User Route
 */
Route::get('/user',[UserController::class, 'index'])->middleware('auth');
Route::get('/user/add',[UserController::class, 'add'])->middleware('auth');
Route::post('/user/add',[UserController::class, 'post'])->middleware('auth');
Route::delete('/user/delete',[UserController::class, 'delete'])->middleware('auth');
Route::get('/user/{id}',[UserController::class, 'edit'])->middleware('auth');
Route::put('/user/put',[UserController::class, 'put'])->middleware('auth');


/*
Rol Route
 */
Route::get('/rol',[RolController::class, 'index'])->middleware('auth');
Route::get('/rol/add',[RolController::class, 'add'])->middleware('auth');
Route::post('/rol/add',[RolController::class, 'post'])->middleware('auth');
Route::delete('/rol/delete',[RolController::class, 'delete'])->middleware('auth');
Route::get('/rol/{id}',[RolController::class, 'edit'])->middleware('auth');
Route::put('/rol/put',[RolController::class, 'put'])->middleware('auth');

/*
TiposCuentas Route
 */
Route::get('/tipoCuenta', [TipoCuentaController::class, 'index'])->middleware('auth');
Route::get('/tipoCuenta/add', [TipoCuentaController::class, 'add'])->middleware('auth');
Route::post('/tipoCuenta/add', [TipoCuentaController::class, 'post'])->middleware('auth');
Route::delete('/tipoCuenta/delete', [TipoCuentaController::class, 'delete'])->middleware('auth');
Route::get('/tipoCuenta/{id}', [TipoCuentaController::class, 'edit'])->middleware('auth');
Route::put('/tipoCuenta/put', [TipoCuentaController::class, 'put'])->middleware('auth');

/*
Empleados Route
 */
Route::get('/empleados', [EmpleadoController::class, 'index'])->middleware('auth');
Route::get('/empleados/add', [EmpleadoController::class, 'add'])->middleware('auth');
Route::post('/empleados/add', [EmpleadoController::class, 'post'])->middleware('auth');
Route::delete('/empleados/delete', [EmpleadoController::class, 'delete'])->middleware('auth');
Route::get('/empleados/{id}', [EmpleadoController::class, 'edit'])->middleware('auth');
Route::put('/empleados/put', [EmpleadoController::class, 'put'])->middleware('auth');

/*
Clientes Route
 */
Route::get('/clientes', [ClientesController::class, 'index'])->middleware('auth');
Route::get('/clientes/add', [ClientesController::class, 'add'])->middleware('auth');
Route::post('/clientes/add', [ClientesController::class, 'post'])->middleware('auth');
Route::delete('/clientes/delete', [ClientesController::class, 'delete'])->middleware('auth');
Route::get('/clientes/{id}', [ClientesController::class, 'edit'])->middleware('auth');
Route::put('/clientes/put', [ClientesController::class, 'put'])->middleware('auth');

/*
Referencias Route
 */
Route::get('/referencias', [ReferenciasController::class, 'index'])->middleware('auth');
Route::get('/referencias/add', [ReferenciasController::class, 'add'])->middleware('auth');
Route::post('/referencias/add', [ReferenciasController::class, 'post'])->middleware('auth');
Route::delete('/referencias/delete', [ReferenciasController::class, 'delete'])->middleware('auth');
Route::get('/referencias/{id}', [ReferenciasController::class, 'edit'])->middleware('auth');
Route::put('/referencias/put', [ReferenciasController::class, 'put'])->middleware('auth');


/*
Asociados Route
 */
Route::get('/asociados', [AsociadosController::class, 'index'])->middleware('auth');
Route::get('/asociados/add', [AsociadosController::class, 'add'])->middleware('auth');
Route::post('/asociados/add', [AsociadosController::class, 'post'])->middleware('auth');
Route::delete('/asociados/delete', [AsociadosController::class, 'delete'])->middleware('auth');
Route::get('/asociados/{id}', [AsociadosController::class, 'edit'])->middleware('auth');
Route::put('/asociados/put', [AsociadosController::class, 'put'])->middleware('auth');

/*
Beneficiarios Route
 */
Route::get('/beneficiarios/{id_asociado?}', [BeneficiariosController::class, 'index'])->middleware('auth');
Route::get('/beneficiarios/add/{id}', [BeneficiariosController::class, 'add'])->middleware('auth');
Route::post('/beneficiarios/add', [BeneficiariosController::class, 'post'])->middleware('auth');
Route::delete('/beneficiarios/delete', [BeneficiariosController::class, 'delete'])->middleware('auth');
Route::get('/beneficiarios/edit/{id_registro}', [BeneficiariosController::class, 'edit'])->middleware('auth');
Route::put('/beneficiarios/put', [BeneficiariosController::class, 'put'])->middleware('auth');

/*
Interes tipos cuenta Route
 */
Route::get('/intereses/{id_asociado?}', [InteresesTipoCuentaController::class, 'index'])->middleware('auth');
Route::get('/intereses/add/{id}', [InteresesTipoCuentaController::class, 'add'])->middleware('auth');
Route::post('/intereses/add', [InteresesTipoCuentaController::class, 'post'])->middleware('auth');
Route::delete('/intereses/delete', [InteresesTipoCuentaController::class, 'delete'])->middleware('auth');
Route::get('/intereses/edit/{id_registro}', [InteresesTipoCuentaController::class, 'edit'])->middleware('auth');
Route::put('/intereses/put', [InteresesTipoCuentaController::class, 'put'])->middleware('auth');
//Ruta para cargar los datos al cambiar el tipo de cuenta
Route::get('intereses/getIntereses/{id}', [InteresesTipoCuentaController::class, 'getIntereses'])->middleware('auth');



/*
Cuentas Route
 */
Route::get('/cuentas', [CuentasController::class, 'index'])->middleware('auth');
Route::get('/cuentas/add', [CuentasController::class, 'add'])->middleware('auth');
Route::post('/cuentas/add', [CuentasController::class, 'post'])->middleware('auth');
Route::delete('/cuentas/delete', [CuentasController::class, 'delete'])->middleware('auth');
Route::get('/cuentas/{id}', [CuentasController::class, 'edit'])->middleware('auth');
Route::put('/cuentas/put', [CuentasController::class, 'put'])->middleware('auth');
//Consultar el saldo de la cuenta
Route::get('cuentas/getcuenta/{id}', [CuentasController::class, 'getCuenta'])->middleware('auth');


/*
Cajas Route
 */
Route::get('/cajas', [CajasController::class, 'index'])->middleware('auth');
Route::get('/cajas/add', [CajasController::class, 'add'])->middleware('auth');
Route::post('/cajas/add', [CajasController::class, 'post'])->middleware('auth');
Route::delete('/cajas/delete', [CajasController::class, 'delete'])->middleware('auth');
Route::get('/cajas/{id}', [CajasController::class, 'edit'])->middleware('auth');
Route::put('/cajas/put', [CajasController::class, 'put'])->middleware('auth');


/*
Movimientos Route
 */
Route::get('/movimientos', [MovimientosController::class, 'index'])->middleware('auth');
Route::get('/movimientos/depositar/{id}', [MovimientosController::class, 'depositar'])->middleware('auth');
Route::post('/movimientos/realizardeposito', [MovimientosController::class, 'realizardeposito'])->middleware('auth');
Route::get('/movimientos/retirar/{id}', [MovimientosController::class, 'retirar'])->middleware('auth');
Route::post('/movimientos/realizarretiro', [MovimientosController::class, 'realizarretiro'])->middleware('auth');
Route::put('/movimientos/put', [MovimientosController::class, 'put'])->middleware('auth');
Route::post('/movimientos/anularmovimiento', [MovimientosController::class, 'anularmovimiento'])->middleware('auth');



/*
Movimientos Route
 */
Route::get('/bobeda', [BobedaController::class, 'index'])->middleware('auth');
Route::get('/bobeda/transferir/{id}', [BobedaController::class, 'transferir'])->middleware('auth');
Route::post('/bobeda/realizarTraslado', [BobedaController::class, 'realizarTraslado'])->middleware('auth');
Route::post('/bobeda/recibirTraslado', [BobedaController::class, 'recibirTraslado'])->middleware('auth');
Route::get('/bobeda/recibir/{id}', [BobedaController::class, 'recibir'])->middleware('auth');
Route::put('/bobeda/put', [BobedaController::class, 'put'])->middleware('auth');



/*
Apertura Caja Route
 */
Route::get('/apertura', [AperturaCajaController::class, 'index'])->middleware('auth');
Route::get('/apertura/aperturarcaja', [AperturaCajaController::class, 'aperturar'])->middleware('auth');
Route::post('/apertura/aperturarcaja', [AperturaCajaController::class, 'aperturarcaja'])->middleware('auth');
Route::post('/apertura/recibirTraslado', [AperturaCajaController::class, 'recibirTraslado'])->middleware('auth');
Route::get('/apertura/recibir/{id}', [AperturaCajaController::class, 'recibir'])->middleware('auth');
Route::put('/apertura/put', [AperturaCajaController::class, 'put'])->middleware('auth');
Route::get('apertura/gettraslado/{id}', [AperturaCajaController::class, 'gettraslado'])->middleware('auth');