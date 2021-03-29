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
<<<<<<< HEAD
Route::get('/history', function () {
    return view('history');
});
=======
Route::get('manajer_inventaris/Input_Asset/index', [App\Http\Controllers\AssetController::class, 'index']);
Route::post('Input_Asset/store', [App\Http\Controllers\AssetController::class, 'store']);
// Route::delete('/pendapataninti/{income:id}', 'IncomeController@destroy');
Route::get('manajer_inventaris/Input_Asset/update/{income:id}',  [App\Http\Controllers\AssetController::class, 'updateindex']);
Route::patch('manajer_inventaris/Input_Asset/update/{income:id}',  [App\Http\Controllers\AssetController::class, 'update']);
>>>>>>> 6636ba99fa6686a38f2f30ac38c16b5278ab7e8d



//Fitur Accept Asset
Route::get('/Pinjam Asset/index', function () {
    return view('/manajer_inventaris/Pinjam Asset/index');
});

<<<<<<< HEAD

// Route::get('/manajer_inventaris/input','App\Http\Controllers\AssetController@index');
=======
Route::get('/manajer_inventaris/input','App\Http\Controllers\AssetController@index');
>>>>>>> 6636ba99fa6686a38f2f30ac38c16b5278ab7e8d

Route::get('manajer_inventaris/hapus/{id}','App\Http\Controllers\AssetController@destroy');

Route::get('/manajer_inventaris/update', function () {
    return view('/manajer_inventaris/update');
});

Auth::routes();

<<<<<<< HEAD
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Search
Route::get('/asset','AssetController@index');
Route::get('/asset/cari','AssetController@cari');
=======
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
>>>>>>> 6636ba99fa6686a38f2f30ac38c16b5278ab7e8d
