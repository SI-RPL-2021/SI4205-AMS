<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
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

Route::get('manajer_inventaris/Input_Asset/index', [App\Http\Controllers\AssetController::class, 'index']);
Route::post('Input_Asset/store', [App\Http\Controllers\AssetController::class, 'store']);
// Route::delete('/pendapataninti/{income:id}', 'IncomeController@destroy');
Route::get('manajer_inventaris/Input_Asset/update/{income:id}',  [App\Http\Controllers\AssetController::class, 'updateindex']);
Route::patch('manajer_inventaris/Input_Asset/update/{income:id}',  [App\Http\Controllers\AssetController::class, 'update']);



//Fitur Accept Asset
Route::get('/Pinjam Asset/index', function () {
    return view('/manajer_inventaris/Pinjam Asset/index');
});


// Route::get('/manajer_inventaris/input','App\Http\Controllers\AssetController@index');
Route::get('/manajer_inventaris/input','App\Http\Controllers\AssetController@index');

Route::get('manajer_inventaris/hapus/{id}','App\Http\Controllers\AssetController@destroy');

Route::get('/manajer_inventaris/update', function () {
    return view('/manajer_inventaris/update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Search
Route::get('/searc', [App\Http\Controllers\AssetController::class, 'indexx'])->name('search');
Route::get('/searchh/cari', [App\Http\Controllers\AssetController::class, 'cari'])->name('search');

// History
Route::get('/histo', [App\Http\Controllers\AssetController::class, 'indexxx'])->name('history');

//Login
Route::get('/uploadfile', 'UploadfileController@index');
Route::post('/uploadfile', 'UploadfileController@upload');
Route::get('/main', [App\Http\Controllers\MainController::class, 'index']);
Route::post('/main/checklogin', [App\Http\Controllers\MainController::class, 'checklogin']);
Route::get('main/successlogin', [App\Http\Controllers\MainController::class, 'successlogin']);
Route::get('main/logout', [App\Http\Controllers\MainController::class, 'logout']);

//register


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
