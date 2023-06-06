<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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
