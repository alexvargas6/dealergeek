<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexControl;
use App\Http\Controllers\seguimientoController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\paquetesController;
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

Route::get('/', [indexControl::class, 'index'])->name('principal');

Route::group(['prefix' => 'seguimiento'], function () {
    Route::get('/ver', [seguimientoController::class, 'index'])->name(
        'showSeguimiento'
    );
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('/paquetes', [paquetesController::class, 'index'])->name(
        'showPaquetes'
    );
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

Auth::routes();

Route::get('/home', [adminController::class, 'index'])
    ->name('home')
    ->middleware('auth');
