<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexControl;
use App\Http\Controllers\seguimientoController;
use App\Http\Controllers\adminController;
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
    Route::get('/paquetes', [adminController::class, 'moduloPaquetes'])->name(
        'showPaquetes'
    );
});

Auth::routes();

Route::get('/home', [adminController::class, 'index'])
    ->name('home')
    ->middleware('auth');
