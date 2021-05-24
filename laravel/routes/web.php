<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
//Manajer Inventaris
Route::get('/', function () {
    return view('welcome');
});

//Fitur CRUD Asset

Route::get('manajer_inventaris/Input_Asset/index', [App\Http\Controllers\AssetController::class, 'index'])->name('asset.show');
Route::post('Input_Asset/store', [App\Http\Controllers\AssetController::class, 'store'])->name('asset.save');
Route::get('Input_Asset/update/{assets:id}',  [App\Http\Controllers\AssetController::class, 'updateindex'])->name('asset.details');
Route::patch('manajer_inventaris/Input_Asset/update/{assets:id}',  [App\Http\Controllers\AssetController::class, 'update'])->name('asset.update');
Route::delete('delete/{assets:id}',  [App\Http\Controllers\AssetController::class, 'destroy'])->name('asset.delete');
Route::get('searchAsset', [App\Http\Controllers\AssetController::class, 'search'])->name('asset.search');

//Fitur CRUD Category Asset

Route::get('manajer_inventaris/category/index', [App\Http\Controllers\CategoryController::class, 'index'])->name('cat.show');
Route::post('category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('cat.save');
Route::get('category/update/{category:id}',  [App\Http\Controllers\CategoryController::class, 'updateindex'])->name('cat.details');
Route::patch('manajer_inventaris/category/update/{categories:id}',  [App\Http\Controllers\CategoryController::class, 'update'])->name('cat.update');
Route::delete('category/delete/{cat:id}',  [App\Http\Controllers\CategoryController::class, 'destroy'])->name('cat.delete');
Route::get('searchCat', [App\Http\Controllers\CategoryController::class, 'search'])->name('cat.search');

//Fitur CRUD peminjaman

Route::get('manajer_inventaris/borrowing/rent/index', [App\Http\Controllers\BorrowingController::class, 'index'])->name('borrowing.show');
Route::post('rent/store', [App\Http\Controllers\BorrowingController::class, 'store'])->name('borrowing.save');
Route::get('borrowing/rent/update/{borrow:id}',  [App\Http\Controllers\BorrowingController::class, 'updateindex'])->name('borrowing.details');
Route::patch('manajer_inventaris/borrowing/rent/update/{borrow:id}',  [App\Http\Controllers\BorrowingController::class, 'update'])->name('borrowing.update');
Route::delete('/borrowing/{borrow}/rent/destroy',  [App\Http\Controllers\BorrowingController::class, 'destroy'])->name('borrowing.destroy');


//Fitur CRUD pengembalian

Route::get('manajer_inventaris/borrowing/return/index', [App\Http\Controllers\RestoreController::class, 'index'])->name('return.show');
Route::post('return/store', [App\Http\Controllers\RestoreController::class, 'store'])->name('return.save');
Route::get('return/update/{restore:id}',  [App\Http\Controllers\RestoreController::class, 'updateindex'])->name('return.details');
Route::patch('manajer_inventaris/borrowing/return/update/{restore:id}',  [App\Http\Controllers\RestoreController::class, 'update'])->name('return.update');
Route::delete('/borrowing/{restore}/return/destroy',  [App\Http\Controllers\RestoreController::class, 'destroy'])->name('return.destroy');

//Fitur CRUD Maintenance

Route::get('manajer_inventaris/Maintenance/index', [App\Http\Controllers\MaintenanceController::class, 'index'])->name('maintenance.show');
Route::post('Maintenance/store', [App\Http\Controllers\MaintenanceController::class, 'store'])->name('maintenance.save');
Route::get('Maintenance/update/{maintenance:id}',  [App\Http\Controllers\MaintenanceController::class, 'updateindex'])->name('maintenance.details');
Route::patch('manajer_inventaris/Maintenance/update/{maintenance:id}',  [App\Http\Controllers\MaintenanceController::class, 'update'])->name('maintenance.update');
Route::delete('maintenance/delete/{Maintenances:id}',  [App\Http\Controllers\MaintenanceController::class, 'destroy'])->name('Maintenance.delete')->name('maintenance.delete');

//Fitur CRUD Report Rutin

Route::get('manajer_inventaris/report/index', [App\Http\Controllers\ReportController::class, 'index'])->name('report.show');
Route::post('report/store', [App\Http\Controllers\ReportController::class, 'store'])->name('report.save');
Route::get('report/update/{reports:id}',  [App\Http\Controllers\ReportController::class, 'updateindex'])->name('report.details');
Route::patch('manajer_inventaris/report/update/{reports:id}',  [App\Http\Controllers\ReportController::class, 'update'])->name('report.update');
Route::delete('delete/{reports:id}',  [App\Http\Controllers\ReportController::class, 'destroy'])->name('report.delete');
Route::get('searchreport', [App\Http\Controllers\ReportController::class, 'search'])->name('report.search');


Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');