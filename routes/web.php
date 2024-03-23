<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminHomeController;
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

// Rutas para usuarios autenticados
Route::middleware(['auth'])->group(function () {

    // Logout del usuario
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    // Rutas accesibles para usuarios autenticados aquí
    Route::get('/panel', [HomeController::class, 'index'])->name('home');
    Route::view('/nosotros', 'nosotros.index')->name('nosotros');
    Route::resource('/reportar', ReportarController::class);
    Route::get('/reportes', [ReportesController::class, 'index'])->name('reportes');
    Route::resource('/noticias', NoticiasController::class);
    //Route::resource('/detalle', DetalleController::class);
    //Route::get('/detalle/{id}', [NoticiasController::class, 'detalle',])->name('detalle');
    Route::resource('/cuenta', UserController::class);

    // Acciones del usuario
    Route::post('/enviar', [ReportarController::class, 'EnviarReporte'])->name('envio_reporte');

    // Ruta del admin
    Route::get('/panel2', [AdminHomeController::class, 'index'])->name('panel2');
    Route::resource('/pendiente', AdminController::class);
    Route::get('/categorias', [AdminController::class, 'categorias'])->name('categorias');
    Route::delete('/eliminarCategoria/{id}', [AdminController::class, 'eliminarCategoria'])->name('eliminar');
    Route::get('/detalleA/{id}', [AdminController::class, 'detalleA'])->name('detalleA');
    // Datos del admin
    Route::get('/cuentaA', [AdminController::class, 'cuentaA'])->name('cuentaA');
    // Reportes aprobados
    Route::get('/aprobados', [AdminController::class, 'Raprobados'])->name('aprobados');
    // Reportes desarpobados
    Route::get('/desaprobados', [AdminController::class, 'Rdesaprobados'])->name('desaprobados');

    // Acciones del Admin
    Route::post('/aprobar/{id}', [AdminController::class, 'AprobarReporte'])->name('aprobarR');
    Route::post('/desaprobar/{id}', [AdminController::class, 'DesaprobarReporte'])->name('desaprobarR');



    // Después de aprobar el reporte | Acción Admin
    Route::get('/detalleaprobado/{id}', [AdminController::class, 'detalleAprobado'])->name('detalleaprobado');
    // 
    Route::post('/ejecutar/{id}', [AdminController::class, 'ejecutarR'])->name('ejecutarR');
    // Reportes ejecutados:
    Route::get('/ejecucion', [AdminController::class, 'Rejecutados'])->name('Rejecutados');
    // Reportes Solucionados:
    Route::get('/solucionados', [AdminController::class, 'Rsolucionados'])->name('Rsolucionados');
    // Reportes No solucionados:
    Route::get('/nosulucionados', [AdminController::class, 'Rnosolucionados'])->name('Rnosolucionado');

    //
    Route::post('/solucionado/{id}', [AdminController::class, 'solucionadoR'])->name('solucionadoR');

    //
    Route::post('/noSolucionado/{id}', [AdminController::class, 'noSolucionadoR'])->name('noSolucionadoR');
});


