<?php

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

//Fitur CRUD Asset
Route::get('/', function () {
    return view('adminlte');
});
Route::get('/history', function () {
    return view('history');
});

Route::get('/manajer_inventaris/input', function () {
    return view('/manajer_inventaris/input');
});


// Route::get('/manajer_inventaris/input','App\Http\Controllers\AssetController@index');

// Route::get('manajer_inventaris/hapus/{id}','App\Http\Controllers\AssetController@hapus');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Search
Route::get('/asset','AssetController@index');
Route::get('/asset/cari','AssetController@cari');