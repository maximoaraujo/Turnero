<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ControladorTurnos;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Turnos
//Route::get('/dengue', [HomeController::class, 'dengue']);
Route::get('/dengue', [ControladorTurnos::class, 'dengue']);
Route::post('/busco_paciente', [ControladorTurnos::class, 'busco_paciente']);
Route::post('/guardo_general', [ControladorTurnos::class, 'guardo_general'])->name('guardo_general');
Route::get('/comprobante_turno/{fecha}/{id}/{documento}/{paciente}', [ControladorTurnos::class, 'comprobante_turno']);

//Planilla
Route::get('/planilla', [HomeController::class, 'planilla']);

//Ver turnos
Route::get('/ver-turnos', [HomeController::class, 'ver_turnos']);
