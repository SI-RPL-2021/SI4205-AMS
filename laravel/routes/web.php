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

//Fitur CRUD Asset
Route::get('/', function () {
    return view('home');
});
Route::get('manajer_inventaris/Input_Asset/index', 'app\Http\Controllers\AssetController@index');
Route::post('/pendapataninti/store', 'IncomeController@store');
Route::delete('/pendapataninti/{income:id}', 'IncomeController@destroy');
Route::get('/editpendapatan/{income:id}', 'IncomeController@updateIndex');
Route::patch('/editpendapatan/{income:id}', 'IncomeController@update');


//Fitur Accept Asset
Route::get('/Pinjam Asset/index', function () {
    return view('/manajer_inventaris/Pinjam Asset/index');
});

// Route::get('/manajer_inventaris/input','App\Http\Controllers\AssetController@index');

// Route::get('manajer_inventaris/hapus/{id}','App\Http\Controllers\AssetController@hapus');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
