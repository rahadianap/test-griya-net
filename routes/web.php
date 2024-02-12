<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PaketPenjualanController;
use App\Http\Controllers\Admin\Report\ReportController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;

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
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(['middleware' => 'auth'], function() {
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');

    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);

    Route::group(['middleware' => 'checkRole:admin'], function() {
        Route::inertia('/adminDashboard', 'Admin/AdminDashboard')->name('adminDashboard');
        Route::inertia('/paket-penjualan', 'Admin/PaketPenjualan')->name('paketPenjualan');
        Route::inertia('/sales', 'Admin/Sales')->name('sales');
        Route::inertia('/report', 'Admin/Report')->name('report');
        Route::inertia('/report/download-pdf', 'Admin/Report')->name('download-pdf');
        Route::inertia('/report/stream-pdf', 'Admin/Report')->name('stream-pdf');
        Route::inertia('/verifyCustomer', 'Admin/Customer')->name('verifyCustomer');
    });
    Route::group(['middleware' => 'checkRole:sales'], function() {
        Route::inertia('/salesDashboard', 'Sales/SalesDashboard')->name('salesDashboard');
        Route::inertia('/customer', 'Sales/Customer')->name('customer');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
