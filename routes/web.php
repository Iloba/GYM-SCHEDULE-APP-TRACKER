<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\WorkoutController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('clients', ClientController::class)->middleware('auth');
Route::resource('schedules', ScheduleController::class)->middleware('auth');
Route::resource('workouts', WorkoutController::class)->middleware('auth');

Route::post('store-on-click', [ScheduleController::class, 'storeOnClick'])->name('store.on.click');
Route::patch('update-on-click/{id}', [ScheduleController::class, 'updateOnClick'])->name('update.on.click');
Route::delete('delete-on-click/{id}', [ScheduleController::class, 'deleteOnClick'])->name('delete.on.click');


Route::get('/export-user-workout/{id}', [ClientController::class, 'exportClientData'])->name('export.client.data');


