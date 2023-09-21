<?php

use App\Http\Controllers\ActiveController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::prefix('dashboard/userprofile')->group(function () {
    Route::get('/', UserProfileController::class . '@index')->name('user.index');
    Route::get('dashboard/userprofile/create', UserProfileController::class . '@create')->name('user.create');
    Route::post('dashboard/userprofile', UserProfileController::class . '@store')->name('user.store');
    Route::get('dashboard/userprofile/{post}', UserProfileController::class . '@show')->name('user.show');
    Route::get('dashboard/userprofile/{post}/edit', UserProfileController::class . '@edit')->name('user.edit');
    Route::post('dashboard/userprofile/{post}', UserProfileController::class . '@update')->name('user.update');
    Route::delete('dashboard/userprofile/{post}', UserProfileController::class . '@destroy')->name('user.destroy');
});
Route::prefix('dashboard/report')->group(function () {
    Route::get('/', [ReportController::class, 'index'])->name('report.index');
    Route::get('dashboard/report/data', [ReportController::class, 'getData'])->name('report.data');
});
Route::prefix('dashboard/active')->group(function () {
    Route::get('/', [ActiveController::class, 'index'])->name('dashboard.active.index');
    Route::get('/', [ActiveController::class, 'mikrotik']);
    Route::get('/active-users', [ActiveController::class, 'index'])->name('active.index');
});
Route::prefix('dashboard/user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('dashboard.user.index');
    Route::get('/', [UserController::class, 'mikrotik']);
    // Route::delete('/users/{id}', 'UserController@delete')->name('users.delete');
    // Route::get('/active-users', [UserController::class, 'index'])->name('active.index');
});