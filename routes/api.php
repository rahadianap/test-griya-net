<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PaketPenjualanController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Sales\CustomerController;
use App\Http\Controllers\Admin\Report\ReportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResources([
    'paket-penjualan' => PaketPenjualanController::class
]);

Route::apiResources([
    'sales' => SalesController::class
]);

Route::apiResources([
    'customer' => CustomerController::class
]);

Route::get('/report', [ReportController::class, 'indexReport'])->name('index-report');
Route::get('/report/download-pdf', [ReportController::class, 'download'])->name('download-pdf');
Route::get('/report/stream-pdf', [ReportController::class, 'stream'])->name('stream-pdf');
Route::put('customer/verify/{id}', [SalesController::class, 'verifyCustomer'])->name('verify-customer');

// Route::get('/paket-penjualan', [PaketPenjualanController::class, 'index']);
// Route::post('/paket-penjualan/store', [PaketPenjualanController::class, 'store']);
// Route::get('/paket-penjualan/edit/{id}', [PaketPenjualanController::class, 'edit']);

// Route::group(['middleware' => 'auth'], function() {
//     Route::group(['middleware' => 'checkRole:admin'], function() {
//         Route::get('/paket-penjualan', [PaketPenjualanController::class, 'index']);
//     });
// });
