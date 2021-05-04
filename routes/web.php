<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TurnosRestantesController;
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

//Usuarios
Route::get('/mi-perfil', [HomeController::class, 'mi_perfil']);
Route::get('/turnos-asignados', [HomeController::class, 'turnos_asignados']);

//Turnos
Route::get('/dengue', [ControladorTurnos::class, 'dengue']);
Route::get('/exudado', [ControladorTurnos::class, 'exudado']);
Route::get('/espermograma', [ControladorTurnos::class, 'espermograma']);
Route::get('/general', [ControladorTurnos::class, 'general']);
Route::get('/citogenetica', [ControladorTurnos::class, 'citogenetica']);
Route::get('/comprobante_turno/{id_turno}', [ControladorTurnos::class, 'comprobante_turno']);
Route::get('/rechazo', [ControladorTurnos::class, 'rechazo_turno']);

//Demanda
Route::get('/consultas', [ControladorTurnos::class, 'consultas']);

//Planilla
Route::get('/planilla', [HomeController::class, 'planilla']);

//Ver turnos
Route::get('/ver-turnos', [HomeController::class, 'ver_turnos']);
Route::get('/vista-turnos', [HomeController::class, 'vista_turnos']);
Route::get('/turnos-restantes{id_horario}', [TurnosRestantesController::class, 'index']);
Route::get('/orden_turno{id_turno}', [HomeController::class, 'orden_turno']);

//Pacientes
Route::get('/pacientes', [HomeController::class, 'pacientes']);

//Estadisticas
Route::get('/estadisticas', [HomeController::class, 'estadisticas'])->middleware('admin');

//Configuraciones
Route::get('/configuraciones', [HomeController::class, 'configuraciones'])->middleware('desarrollador');
