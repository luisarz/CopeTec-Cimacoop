<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TipoCuentaController;
use App\Http\Controllers\EmpleadoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

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