<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexControl;
use App\Http\Controllers\seguimientoController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\paquetesController;
use App\Http\Controllers\eventosController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\ReportController;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;
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
Route::get('/test', function () {
    Mail::to('alxdeosandrock@gmail.com')->send(new DemoEmail('prueb'));
});

Route::get('/', [indexControl::class, 'index'])->name('principal');
Route::get('/obtener-permisos-usuario/{id}', [
    PermisosController::class,
    'obtenerPermisosUsuario',
])->name('obternerpermisos.usuario');

Route::get('/panel/admin', [indexControl::class, 'administrador'])
    ->name('principalAdmin')
    ->middleware('auth');

Route::group(['prefix' => 'seguimiento'], function () {
    Route::get('paquete/ultimo-evento/{id}', [
        seguimientoController::class,
        'ultimoEvento',
    ])->name('ultimoEvento');

    Route::get('/ver/{id}', [seguimientoController::class, 'show'])->name(
        'showSeguimiento'
    );
    Route::post('/seguirClave', [seguimientoController::class, 'store'])->name(
        'seguimientoPost'
    );
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('/panel', [adminController::class, 'panelAdm'])
        ->name('admin.panel')
        ->middleware('auth');

    Route::get('/paquetes', [paquetesController::class, 'index'])
        ->name('showPaquetes')
        ->middleware('auth');
    Route::get('paquetes/create', [paquetesController::class, 'create'])->name(
        'paquetes.create'
    );
    Route::post('paquetes', [paquetesController::class, 'store'])->name(
        'paquetes.store'
    );
    Route::get('paquetes/{id}', [paquetesController::class, 'show'])->name(
        'paquetes.show'
    );
    Route::get('paquetes/{id}/edit', [paquetesController::class, 'edit'])->name(
        'paquetes.edit'
    );
    Route::put('paquetes/{id}', [paquetesController::class, 'update'])->name(
        'paquetes.update'
    );
    Route::delete('paquetes/{id}', [
        paquetesController::class,
        'destroy',
    ])->name('paquetes.destroy');
});
Route::group(['prefix' => 'eventos'], function () {
    Route::post('/store', [eventosController::class, 'store'])
        ->name('eventos.store')
        ->middleware('auth');

    Route::get('/reportes', [
        ReportController::class,
        'generarReporteDelDia',
    ])->name('eventos.reporte');
});
Route::group(['prefix' => 'permisos'], function () {
    Route::post('/store', [PermisosController::class, 'store'])
        ->name('permisos.store')
        ->middleware('auth');
});
Auth::routes();

Route::get('/home', [adminController::class, 'index'])
    ->name('home')
    ->middleware('auth');
