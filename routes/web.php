<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\StationController;
use Illuminate\Support\Facades\Route;

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
    return redirect('login');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('cash-register',CashierController::class);
    Route::resource('drivers',   DriverController::class);
    Route::resource('buses',     BusController::class);
    Route::resource('stations',  StationController::class);
    Route::resource('routes',    RouteController::class);

});

require __DIR__.'/auth.php';
