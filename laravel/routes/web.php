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
    return view('home');
});


//Fitur CRUD Asset
Route::get('/update', function () {
    return view('manajer_inventaris/Input_Asset/update');
});
Route::get('manajer_inventaris/Input_Asset/index', [App\Http\Controllers\AssetController::class, 'index'])->name('asset.show');
Route::post('Input_Asset/store', [App\Http\Controllers\AssetController::class, 'store'])->name('asset.save');
Route::get('Input_Asset/update/{assets:id}',  [App\Http\Controllers\AssetController::class, 'updateindex'])->name('asset.details');
Route::patch('manajer_inventaris/Input_Asset/update/{assets:id}',  [App\Http\Controllers\AssetController::class, 'update'])->name('asset.update');
Route::delete('delete/{assets:id}',  [App\Http\Controllers\AssetController::class, 'destroy'])->name('asset.delete')->name('asset.delete');




//Fitur Accept Asset
Route::get('/Pinjam Asset/index', function () {
    return view('/manajer_inventaris/Pinjam Asset/index');
});

Route::get('/manajer_inventaris/input','App\Http\Controllers\AssetController@index');

Route::get('manajer_inventaris/hapus/{id}','App\Http\Controllers\AssetController@destroy');

Route::get('/manajer_inventaris/update', function () {
    return view('/manajer_inventaris/update');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');