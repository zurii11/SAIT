<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\DeparturesController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\RouteScheduleController;
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

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', [DeparturesController::class, 'index'])->name('dashboard');

    Route::get('register-user', [RegisteredUserController::class, 'createUser'])->name('register.user');
    Route::post('register-user', [RegisteredUserController::class, 'storeUser'])->name('register.user.store');

    Route::resource('cash-register', CashierController::class);
    Route::resource('drivers', DriverController::class);
    Route::resource('buses', BusController::class);
    Route::resource('stations', StationController::class);

    Route::resource('routes', RouteController::class);
    Route::resource('routes.schedules', RouteScheduleController::class);

    Route::resource('departures', DeparturesController::class);

    Route::group(['prefix' => 'ajax'], function () {
        Route::put('/route/schedule/disable/{scheduleId}', [RouteScheduleController::class, 'disableSchedule']);
        Route::get('/buses/{company_id}', [BusController::class, 'allCompanyBusesJson'])->name('api.buses');
    });
});

require __DIR__ . '/auth.php';
