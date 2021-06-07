<?php

use Illuminate\Routing\RouteGroup;
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
    return view('auth/login');
});

Route::middleware('auth')->group(function () {
    //Fitur CRUD Asset
    Route::get('/', function () {
        return view('/welcome');
    });
    Route::get('manajer_inventaris/Input_Asset/index', [App\Http\Controllers\AssetController::class, 'index'])->name('asset.show');
    Route::post('Input_Asset/store', [App\Http\Controllers\AssetController::class, 'store'])->name('asset.save');
    Route::get('Input_Asset/update/{assets:id}',  [App\Http\Controllers\AssetController::class, 'updateindex'])->name('asset.details');
    Route::patch('manajer_inventaris/Input_Asset/update/{assets:id}',  [App\Http\Controllers\AssetController::class, 'update'])->name('asset.update');
    Route::delete('delete/{assets:id}',  [App\Http\Controllers\AssetController::class, 'destroy'])->name('asset.delete');
    Route::get('searchAsset', [App\Http\Controllers\AssetController::class, 'search'])->name('asset.search');
});


//Fitur CRUD Category Asset

Route::get('manajer_inventaris/category/index', [App\Http\Controllers\CategoryController::class, 'index'])->name('cat.show');
Route::post('category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('cat.save');
Route::get('category/update/{category:id}',  [App\Http\Controllers\CategoryController::class, 'updateindex'])->name('cat.details');
Route::patch('manajer_inventaris/category/update/{categories:id}',  [App\Http\Controllers\CategoryController::class, 'update'])->name('cat.update');
Route::delete('category/delete/{cat:id}',  [App\Http\Controllers\CategoryController::class, 'destroy'])->name('cat.delete');
Route::get('searchCat', [App\Http\Controllers\CategoryController::class, 'search'])->name('cat.search');

//Fitur CRUD pengembalian

Route::get('manajer_inventaris/borrowing/return/index', [App\Http\Controllers\BorrowingController::class, 'index'])->name('return.show');
Route::post('return/store', [App\Http\Controllers\BorrowingController::class, 'store'])->name('return.save');
Route::get('borrowing/return/update/{borrow:id}',  [App\Http\Controllers\BorrowingController::class, 'updateindex'])->name('return.details');
Route::patch('manajer_inventaris/borrowing/return/update/{borrow:id}',  [App\Http\Controllers\BorrowingController::class, 'update'])->name('return.update');
Route::delete('/borrowing/{borrow}/return/destroy',  [App\Http\Controllers\BorrowingController::class, 'destroy'])->name('return.destroy');

//Fitur CRUD peminjaman

Route::get('manajer_inventaris/borrowing/return/index', [App\Http\Controllers\BorrowingController::class, 'index'])->name('return.show');
Route::post('return/store', [App\Http\Controllers\BorrowingController::class, 'store'])->name('return.save');
Route::get('borrowing/return/update/{borrow:id}',  [App\Http\Controllers\BorrowingController::class, 'updateindex'])->name('return.details');
Route::patch('manajer_inventaris/borrowing/return/update/{borrow:id}',  [App\Http\Controllers\BorrowingController::class, 'update'])->name('return.update');
Route::delete('/borrowing/{borrow}/return/destroy',  [App\Http\Controllers\BorrowingController::class, 'destroy'])->name('return.destroy');

//Fitur CRUD Maintenance

Route::get('manajer_inventaris/Maintenance/index', [App\Http\Controllers\MaintenanceController::class, 'index'])->name('maintenance.show');
Route::post('Maintenance/store', [App\Http\Controllers\MaintenanceController::class, 'store'])->name('maintenance.save');
Route::get('Maintenance/update/{maintenance:id}',  [App\Http\Controllers\MaintenanceController::class, 'updateindex'])->name('maintenance.details');
Route::patch('manajer_inventaris/Maintenance/update/{maintenance:id}',  [App\Http\Controllers\MaintenanceController::class, 'update'])->name('maintenance.update');
Route::delete('maintenance/delete/{Maintenances:id}',  [App\Http\Controllers\MaintenanceController::class, 'destroy'])->name('Maintenance.delete')->name('maintenance.delete');

//Fitur CRUD User

Route::get('manajer_inventaris/user/index', [App\Http\Controllers\UserController::class, 'index'])->name('user.show');
Route::post('user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.save');
Route::get('user/update/{users:id}',  [App\Http\Controllers\UserController::class, 'updateindex'])->name('user.details');
Route::patch('manajer_inventaris/user/update/{users:id}',  [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::delete('user/delete/{users:id}',  [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');
Route::get('searchUser', [App\Http\Controllers\UserController::class, 'search'])->name('user.search');


Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');