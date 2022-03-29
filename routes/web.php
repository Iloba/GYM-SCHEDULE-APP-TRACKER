<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\ClientDashboardController;

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

Route::middleware(['auth'])->group(function () {
    Route::resource('clients', ClientController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('workouts', WorkoutController::class);
    Route::get('/export-user-workout/{id}', [ClientController::class, 'exportClientData'])->name('export.client.data');

    Route::post('store-on-click', [ScheduleController::class, 'storeOnClick'])->name('store.on.click');
    Route::patch('update-on-click/{id}', [ScheduleController::class, 'updateOnClick'])->name('update.on.click');
    Route::delete('delete-on-click/{id}', [ScheduleController::class, 'deleteOnClick'])->name('delete.on.click');
    Route::post('/update-instructor-Password/{id}', [ClientController::class, 'updateInstructorPassword'])->name('instructor.update.password');
});

Route::get('/workout/{id}', [ClientController::class, 'showWorkoutsToUsers'])->name('user.workouts.show');





//GROUP ROUTES
Route::middleware(['guest:client'])->group(function () {
    Route::view('/client-login', 'auth.clients.login')->name('client.login.view');
    Route::post('/client-login', [ClientAuthController::class, 'login'])->name('client.login');
});

Route::middleware(['auth:client'])->group(function () {
    Route::get('/client-home', [ClientAuthController::class, 'index'])->name('client.home');
    Route::post('/logout-client', [ClientAuthController::class, 'logout'])->name('client.logout');
    Route::get('/my-workouts', [ClientDashboardController::class, 'displayCalendarWithSchedules'])->name('client.calendar');
    Route::get('/export-clients-workout', [ClientDashboardController::class, 'exportClientData'])->name('export.client.workouts');
    Route::post('/update-Password/{id}', [ClientController::class, 'updatePassword'])->name('update.password');
});

Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:clear');
    return 'Routes cache cleared';
});

Route::get('/config-clear', function() {
    $exitCode = Artisan::call('config:clear');
    return 'Config cache cleared';
});

 Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});

