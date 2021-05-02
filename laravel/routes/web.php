<?php

use Illuminate\Support\Facades\Auth;
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
//Manajer Inventaris
Route::get('/', function () {
    return view('welcome');
});


//Fitur CRUD Asset

Route::get('manajer_inventaris/Input_Asset/index', [App\Http\Controllers\AssetController::class, 'index'])->name('asset.show');
Route::post('Input_Asset/store', [App\Http\Controllers\AssetController::class, 'store'])->name('asset.save');
Route::get('Input_Asset/update/{assets:id}',  [App\Http\Controllers\AssetController::class, 'updateindex'])->name('asset.details');
Route::patch('manajer_inventaris/Input_Asset/update/{assets:id}',  [App\Http\Controllers\AssetController::class, 'update'])->name('asset.update');
Route::delete('delete/{assets:id}',  [App\Http\Controllers\AssetController::class, 'destroy'])->name('asset.delete')->name('asset.delete');

//Fitur CRUD Category Asset

Route::get('manajer_inventaris/category/index', [App\Http\Controllers\CategoryController::class, 'index'])->name('cat.show');
Route::post('category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('cat.save');
Route::get('category/update/{category:id}',  [App\Http\Controllers\CategoryController::class, 'updateindex'])->name('cat.details');
Route::patch('manajer_inventaris/category/update/{category:id}',  [App\Http\Controllers\CategoryController::class, 'update'])->name('cat.update');
Route::delete('delete/{category:id}',  [App\Http\Controllers\CategoryController::class, 'destroy'])->name('asset.delete')->name('cat.delete');

//Fitur CRUD Peminjaman

Route::get('manajer_inventaris/Borrowing/rent/index', [App\Http\Controllers\BorrowingController::class, 'index'])->name('borrowing.show');
Route::post('Borrowing/store', [App\Http\Controllers\BorrowingController::class, 'store'])->name('borrowing.save');
Route::get('borrowing/return/update/{borrow:id}',  [App\Http\Controllers\BorrowingController::class, 'updateindex'])->name('borrowing.details');
Route::patch('manajer_inventaris/borrowing/return/update/{borrow:id}',  [App\Http\Controllers\BorrowingController::class, 'update'])->name('borrowing.update');
Route::delete('/borrowing/{borrow}/destroy',  [App\Http\Controllers\BorrowingController::class, 'destroy'])->name('borrowing.destroy');

//Fitur CRUD Maintenance

Route::get('manajer_inventaris/Maintenance/index', [App\Http\Controllers\MaintenanceController::class, 'index'])->name('maintenance.show');
Route::post('Maintenance/store', [App\Http\Controllers\MaintenanceController::class, 'store'])->name('maintenance.save');
Route::get('Maintenance/update/{maintenance:id}',  [App\Http\Controllers\MaintenanceController::class, 'updateindex'])->name('maintenance.details');
Route::patch('manajer_inventaris/Maintenance/update/{maintenance:id}',  [App\Http\Controllers\MaintenanceController::class, 'update'])->name('maintenance.update');
Route::delete('delete/{Maintenances:id}',  [App\Http\Controllers\MaintenanceController::class, 'destroy'])->name('Maintenance.delete')->name('maintenance.delete');





Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');