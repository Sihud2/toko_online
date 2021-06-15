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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{barang}', 'PesanController@show');
Route::post('/home/{barang}', 'PesanController@pesan');
Route::get('/check_out', 'PesanController@check');
Route::get('/konfirmasi', 'PesanController@konfirmasi');
Route::delete('/check_out/{id}', 'PesanController@hapus');
Route::get('/penjual', 'PesanController@penjual');
// Route::get('/penjual', 'PesanController@penjual');

// Route untuk profile
Route::get('/profil', 'ProfileController@index');
Route::post('/profil', 'ProfileController@update');

// Route untuk riwayat
Route::get('/riwayat', 'RiwayatController@index');
Route::get('/riwayat/{id}', 'RiwayatController@detail');
