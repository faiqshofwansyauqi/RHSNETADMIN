<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserProfileController;

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
    return view('auth/login');
});

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard', [DashboardController::class, 'mikrotik']);

Route::prefix('user')->group(function () {
    Route::get('/', UserProfileController::class . '@index')->name('user.index');
    Route::get('/user/create', UserProfileController::class . '@create')->name('user.create');
    Route::post('/user', UserProfileController::class . '@store')->name('user.store');
    Route::get('/user/{post}', UserProfileController::class . '@show')->name('user.show');
    Route::get('/user/{post}/edit', UserProfileController::class . '@edit')->name('user.edit');
    Route::post('/user/{post}', UserProfileController::class . '@update')->name('user.update');
    Route::delete('/user/{post}', UserProfileController::class . '@destroy')->name('user.destroy');
});
Route::get('/report', [ReportController::class, 'index'])->name('report.index');
Route::get('/report/data', [ReportController::class, 'getData'])->name('report.data');
// Route::resource('user', UserProfileController::class);
