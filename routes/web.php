<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\DetalleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\ReportarController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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



Route::view('/', 'users.login')->name('login');
Route::view('/registro', 'users.register')->name('registro');

Route::post('/validar_registro', [LoginController::class, 'register'])->name('validar_registro');
Route::post('/inicia_sesion', [LoginController::class, 'login'])->name('inicia_sesion');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Route::view('/panel', 'panel')->middleware('auth')->name('panel');
// Vistas de usuario
Route::get('/panel', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::view('/nosotros', 'nosotros.index')->middleware('auth')->name('nosotros');
Route::resource('/reportar', ReportarController::class)->middleware('auth');
Route::resource('/reportes', ReportesController::class);
Route::resource('/noticias', NoticiasController::class);
//Route::resource('/detalle', DetalleController::class);
Route::get('/detalle/{id}', [NoticiasController::class, 'detalle',])->name('detalle');
Route::resource('/cuenta', UserController::class);

// Acciones del usuario
Route::post('/enviar', [ReportarController::class, 'EnviarReporte'])->name('envio_reporte');

// Ruta del admin
Route::get('/panel2', [AdminHomeController::class, 'index'])->name('panel2');
Route::resource('/adminR', AdminController::class);
Route::get('/detalleA/{id}', [AdminController::class, 'detalleA'])->name('detalleA');

// Acciones del Admin
Route::post('/aprobar/{id}', [AdminController::class, 'AprobarReporte'])->name('aprobarR');
Route::post('/desaprobar/{id}', [AdminController::class, 'DesaprobarReporte'])->name('desaprobarR');
