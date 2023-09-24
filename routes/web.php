<?php

use App\Http\Controllers\ActiveController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OmsetController;
use App\Http\Controllers\PengaturanController;
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
Route::get('/dashboard/filter', [DashboardController::class, 'filterData'])->name('dashboard.filter');

Route::prefix('dashboard/userprofile')->group(function () {
    Route::get('/', [UserProfileController::class, 'index'])->name('dashboard.userprofile.index');
    Route::get('/', [UserProfileController::class, 'mikrotik']);
});

Route::prefix('dashboard/pengaturan')->group(function () {
    Route::get('/', [PengaturanController::class, 'index'])->name('dashboard.pengaturan.index');
    // Route::get('/', [PengaturanController::class, 'mikrotik']);
});

Route::prefix('dashboard/omset')->group(function () {
    Route::get('/', [OmsetController::class, 'index'])->name('report.index');
    Route::get('dashboard/omset/data', [OmsetController::class, 'getData'])->name('omset.data');
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